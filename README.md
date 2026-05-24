# 🧪 Programming Lab

Ambiente Docker portátil para estudar lógica e programação em **PHP**, **Python**, **Java**, **C** e **C++**, com terminal **Zsh + Oh My Zsh + Agnoster**, autocomplete, Git e autenticação segura com GitHub via **SSH Agent Forwarding**.

## Objetivo

O código fica no GitHub e o ambiente é reconstruído com Docker. Em qualquer notebook com WSL + Docker:

```bash
git clone git@github.com:SEU-USUARIO/programming-lab.git
cd programming-lab
make init
make up
make shell
```

## Decisão de segurança para GitHub

A chave privada SSH **não entra no container**, **não entra no Dockerfile** e **não é commitada**. Ela permanece no seu WSL host e é utilizada pelo container por meio do socket do `ssh-agent`.

O container já possui as chaves públicas oficiais do host `github.com` no arquivo global `known_hosts`, mantendo a verificação do servidor habilitada.

## Ferramentas instaladas

| Categoria | Ferramentas |
|---|---|
| Shell | Zsh, Oh My Zsh, tema Agnoster, autosuggestions, syntax highlighting |
| PHP | PHP CLI, Composer e extensões comuns |
| Python | Python 3, pip, venv |
| Java | OpenJDK 21, Maven |
| C/C++ | GCC, G++, GDB, CMake, Make |
| Apoio | Git, SSH Client, Curl, Vim, Nano, Tree, JQ |

> A imagem base é `ubuntu:24.04`. As versões exatas dos pacotes são as disponibilizadas pelos repositórios dessa distribuição no momento do build. Execute `make versions` para conferir o ambiente construído.

---

## Estrutura sugerida para exercícios

```text
exercicios/
└── fundamentos-programacao/
    ├── capitulo-01-algoritmos/
    │   └── exercicio-01/
    │       ├── enunciado.md
    │       ├── php/main.php
    │       ├── python/main.py
    │       ├── java/Main.java
    │       └── cpp/main.cpp
    ├── capitulo-02-condicionais/
    ├── capitulo-03-repeticao/
    ├── capitulo-04-vetores/
    └── capitulo-05-matrizes/

projetos/
├── php/
├── python/
├── java/
└── cpp/

notas/
├── logica-programacao.md
├── php.md
├── python.md
├── java.md
└── cpp.md
```

---

# Primeiro uso no WSL

## 1. Pré-requisitos

Tenha instalado e funcionando no WSL:

```bash
docker --version
docker compose version
git --version
ssh -V
```

No Windows Terminal, escolha uma **Nerd Font** para que o tema Agnoster seja exibido corretamente, por exemplo `JetBrainsMono Nerd Font` ou `MesloLGS NF`.

## 2. Configure sua chave SSH no WSL

Verifique se já possui chave:

```bash
ls -al ~/.ssh
```

Caso não possua uma chave para o GitHub, gere uma chave Ed25519 com senha:

```bash
ssh-keygen -t ed25519 -C "SEU_EMAIL_DO_GITHUB"
```

Inicie o agente e adicione a chave:

```bash
eval "$(ssh-agent -s)"
ssh-add ~/.ssh/id_ed25519
```

Mostre a chave pública e cadastre-a no GitHub em **Settings > SSH and GPG keys > New SSH key**:

```bash
cat ~/.ssh/id_ed25519.pub
```

Teste no próprio WSL:

```bash
ssh -T git@github.com
```

Uma autenticação correta retorna uma mensagem dizendo que você foi autenticado com sucesso, mesmo que o GitHub informe que não fornece acesso shell.

## 3. Configure identidade de commit no WSL

Use seu nome e o e-mail que deseja associar aos commits. Para privacidade, você pode usar o endereço `noreply` informado na configuração de e-mail do GitHub.

```bash
git config --global user.name "Seu Nome"
git config --global user.email "seu-email-github-ou-noreply"
```

## 4. Inicialize as configurações locais do laboratório

Na raiz do repositório:

```bash
make init
```

O comando cria o `.env` local preenchendo automaticamente UID/GID do usuário WSL e reaproveitando `user.name` e `user.email` do Git global. Confira o arquivo:

```bash
cat .env
```

O `.env` não será versionado.

## 5. Suba o container

O `ssh-agent` precisa estar ativo **no mesmo terminal** em que você executará o Docker Compose:

```bash
eval "$(ssh-agent -s)"
ssh-add ~/.ssh/id_ed25519

make up
make shell
```

Você entrará em:

```text
/workspace
```

com Zsh, tema Agnoster e autocomplete ativos.

---

# Validação do ambiente

No host WSL:

```bash
make status
make versions
make ssh-test
make git-check
```

Dentro do container:

```bash
php -v
composer --version
python3 --version
java -version
gcc --version
g++ --version
git status
ssh -T git@github.com
```

---

# Fluxo diário de estudos

## Em casa

```bash
cd programming-lab

eval "$(ssh-agent -s)"
ssh-add ~/.ssh/id_ed25519

git pull
make up
make shell
```

Dentro do container:

```bash
mkdir -p exercicios/fundamentos-programacao/capitulo-01-algoritmos/exercicio-01/php
cd exercicios/fundamentos-programacao/capitulo-01-algoritmos/exercicio-01/php
nano main.php
php main.php

git add .
git commit -m "Resolve exercício 01 de algoritmos em PHP"
git push
```

## Em outro notebook

Primeiro configure a chave SSH nesse notebook. Depois:

```bash
git clone git@github.com:SEU-USUARIO/programming-lab.git
cd programming-lab

git config --global user.name "Seu Nome"
git config --global user.email "seu-email-github-ou-noreply"

eval "$(ssh-agent -s)"
ssh-add ~/.ssh/id_ed25519

make init
make up
make shell
```

Os exercícios estarão disponíveis porque vieram do Git; o ambiente será reconstruído pelo Docker.

---

# Comandos do Makefile

| Comando | Finalidade |
|---|---|
| `make init` | Cria `.env` com UID/GID e identidade Git do host |
| `make doctor` | Confere Docker, `.env` e chave carregada no agente |
| `make up` | Constrói e sobe o container |
| `make shell` | Entra no Zsh do laboratório |
| `make versions` | Mostra versões instaladas |
| `make ssh-test` | Testa autenticação GitHub de dentro do container |
| `make git-check` | Mostra identidade e remotos Git |
| `make down` | Encerra o container |
| `make rebuild` | Reconstrói a imagem sem cache |

---

# Iniciando este diretório como repositório GitHub

Caso você tenha recebido esta estrutura como arquivo compactado e ainda não exista um repositório remoto:

```bash
git init
git branch -M main
git add .
git commit -m "Cria laboratório Docker para exercícios de programação"
git remote add origin git@github.com:SEU-USUARIO/programming-lab.git
git push -u origin main
```

Depois disso, o ciclo normal será:

```bash
git pull
make up
make shell
# estudar e desenvolver
git add .
git commit -m "Descrição do estudo"
git push
```

---

# Boas práticas deste laboratório

- Código e configuração Docker ficam no Git.
- `.env`, chaves privadas, builds e dependências locais ficam fora do Git.
- Nenhum exercício é salvo apenas dentro do container: `/workspace` é montado a partir do repositório no host.
- A chave privada continua somente no WSL; o container recebe acesso temporário pelo `ssh-agent`.
- Cada exercício deve conter um `enunciado.md`.
- Commits pequenos documentam sua evolução.

## Referências técnicas usadas na configuração

- GitHub Docs: conexão via SSH, chaves SSH, `ssh-agent` e chaves públicas oficiais do host `github.com`.
- Docker Docs: encaminhamento do socket do SSH Agent para containers e orientação para não usar argumentos/variáveis de build como segredos.
