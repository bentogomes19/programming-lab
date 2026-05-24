SHELL := /bin/bash
.DEFAULT_GOAL := help

-include .env
export

.PHONY: help init doctor build up shell down restart rebuild status versions ssh-test git-check clean

help: ## Lista os comandos disponíveis
	@grep -E '^[a-zA-Z_-]+:.*?## ' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-14s\033[0m %s\n", $$1, $$2}'

init: ## Cria .env usando UID/GID e identidade Git já configurada no WSL
	@if [ -f .env ]; then \
		echo ".env já existe. Nenhuma alteração realizada."; \
	else \
		NAME="$$(git config --global user.name 2>/dev/null || true)"; \
		EMAIL="$$(git config --global user.email 2>/dev/null || true)"; \
		[ -n "$$NAME" ] || NAME="Seu Nome"; \
		[ -n "$$EMAIL" ] || EMAIL="seu-email-github-ou-noreply"; \
		printf "DEV_USERNAME=dev\nHOST_UID=%s\nHOST_GID=%s\nGIT_USER_NAME=%s\nGIT_USER_EMAIL=%s\n" "$$(id -u)" "$$(id -g)" "$$NAME" "$$EMAIL" > .env; \
		echo ".env criado. Revise GIT_USER_NAME e GIT_USER_EMAIL antes do primeiro commit."; \
	fi

doctor: ## Valida dependências locais e autenticação SSH antes do build/up
	@command -v docker >/dev/null || { echo "Docker não encontrado no WSL."; exit 1; }
	@docker compose version >/dev/null || { echo "Docker Compose não encontrado."; exit 1; }
	@test -f .env || { echo "Arquivo .env ausente. Execute: make init"; exit 1; }
	@grep -qv '^GIT_USER_NAME=Seu Nome$$' .env || { echo "Edite GIT_USER_NAME no .env."; exit 1; }
	@grep -qv '^GIT_USER_EMAIL=seu-email-github-ou-noreply$$' .env || { echo "Edite GIT_USER_EMAIL no .env."; exit 1; }
	@test -n "$$SSH_AUTH_SOCK" || { echo 'SSH_AUTH_SOCK ausente. Execute no mesmo terminal: eval "$$(ssh-agent -s)" && ssh-add ~/.ssh/id_ed25519'; exit 1; }
	@ssh-add -l >/dev/null 2>&1 || { echo "Nenhuma chave carregada no ssh-agent. Execute: ssh-add ~/.ssh/id_ed25519"; exit 1; }
	@echo "Ambiente local pronto para subir o container."

build: doctor ## Constrói a imagem Docker
	docker compose build

up: doctor ## Sobe o laboratório em segundo plano
	docker compose up -d --build

shell: ## Entra no container usando Zsh/Agnoster
	docker compose exec workspace zsh

down: ## Remove o container sem apagar seus arquivos versionados
	docker compose down

restart: ## Reinicia o container
	docker compose restart workspace

rebuild: doctor ## Reconstrói a imagem sem cache
	docker compose build --no-cache
	docker compose up -d

status: ## Exibe estado dos serviços
	docker compose ps

versions: ## Exibe versões das linguagens/ferramentas
	docker compose exec workspace zsh -ic 'php -v | head -n 1; composer --version; python3 --version; java -version; gcc --version | head -n 1; g++ --version | head -n 1; cmake --version | head -n 1; git --version'

git-check: ## Confere a identidade Git configurada dentro do container
	docker compose exec workspace zsh -ic 'git config --global user.name && git config --global user.email && git remote -v || true'

ssh-test: ## Testa autenticação GitHub usando o ssh-agent do WSL
	@docker compose exec workspace zsh -ic 'set +e; output="$$(ssh -o BatchMode=yes -T git@github.com 2>&1)"; code=$$?; echo "$$output"; if [ $$code -eq 1 ] && echo "$$output" | grep -q "successfully authenticated"; then exit 0; fi; exit $$code'

clean: ## Remove containers e a imagem local do laboratório
	docker compose down --rmi local
