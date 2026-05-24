#!/usr/bin/env bash
set -Eeuo pipefail

USERNAME="${1:-dev}"
USER_HOME="$(getent passwd "${USERNAME}" | cut -d: -f6)"
ZSH_ROOT="/opt/oh-my-zsh"
ZSH_CUSTOM="${ZSH_ROOT}/custom"

if [[ -z "${USER_HOME}" || ! -d "${USER_HOME}" ]]; then
    echo "Usuário não localizado: ${USERNAME}" >&2
    exit 1
fi

# Oh My Zsh e plugins: instalados globalmente na imagem, sem alterar o repositório do estudante.
git clone --depth=1 https://github.com/ohmyzsh/ohmyzsh.git "${ZSH_ROOT}"
git clone --depth=1 https://github.com/zsh-users/zsh-autosuggestions.git \
    "${ZSH_CUSTOM}/plugins/zsh-autosuggestions"
git clone --depth=1 https://github.com/zsh-users/zsh-syntax-highlighting.git \
    "${ZSH_CUSTOM}/plugins/zsh-syntax-highlighting"

chmod -R a+rX "${ZSH_ROOT}"

# Chaves públicas oficiais do host github.com, publicadas pela documentação GitHub.
# Isso habilita StrictHostKeyChecking sem copiar a chave privada do usuário.
install -d -m 0755 /etc/ssh
cat > /etc/ssh/ssh_known_hosts <<'KNOWN_HOSTS'
github.com ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAIOMqqnkVzrm0SdG6UOoqKLsabgH5C9okWi0dh2l9GKJl
github.com ecdsa-sha2-nistp256 AAAAE2VjZHNhLXNoYTItbmlzdHAyNTYAAAAIbmlzdHAyNTYAAABBBEmKSENjQEezOmxkZMy7opKgwFB9nkt5YRrYMjNuG5N87uRgg6CLrbo5wAdT/y6v0mKV0U2w0WZ2YB/++Tpockg=
github.com ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABgQCj7ndNxQowgcQnjshcLrqPEiiphnt+VTTvDP6mHBL9j1aNUkY4Ue1gvwnGLVlOhGeYrnZaMgRK6+PKCUXaDbC7qtbW8gIkhL7aGCsOr/C56SJMy/BCZfxd1nWzAOxSDPgVsmerOBYfNqltV9/hWCqBywINIR+5dIg6JTJ72pcEpEjcYgXkE2YEFXV1JHnsKgbLWNlhScqb2UmyRkQyytRLtL+38TGxkxCflmO+5Z8CSSNY7GidjMIZ7Q4zMjA2n1nGrlTDkzwDCsw+wqFPGQA179cnfGWOWRVruj16z6XyvxvjJwbz0wQZ75XK5tKSb7FNyeIEs4TT4jk+S4dhPeAUC5y+bDYirYgM4GC7uEnztnZyaVWQ7B381AK4Qdrwt51ZqExKbQpTUNn+EjqoTwvqNj4kqx5QUCI0ThS/YkOxJCXmPUWZbhjpCg56i+2aB6CmK2JGhn57K5mj0MNdBXA4/WnwH6XoPWJzK5Nyu2zB3nAZp+S5hpQs+p1vN1/wsjk=
KNOWN_HOSTS
chmod 0644 /etc/ssh/ssh_known_hosts

# Comando executado ao abrir o Zsh: configura identidade/boas práticas Git,
# mas nunca grava token ou chave privada na imagem.
cat > /usr/local/bin/workspace-git-config <<'GIT_CONFIG'
#!/usr/bin/env bash
set -Eeuo pipefail

if [[ -n "${GIT_USER_NAME:-}" && -n "${GIT_USER_EMAIL:-}" ]]; then
    git config --global user.name "${GIT_USER_NAME}"
    git config --global user.email "${GIT_USER_EMAIL}"
fi

git config --global init.defaultBranch main
git config --global core.autocrlf input
git config --global fetch.prune true
git config --global pull.ff only

if ! git config --global --get-all safe.directory 2>/dev/null | grep -qx '/workspace'; then
    git config --global --add safe.directory /workspace
fi
GIT_CONFIG
chmod 0755 /usr/local/bin/workspace-git-config

install -d -o "${USERNAME}" -g "${USERNAME}" -m 0700 "${USER_HOME}/.ssh"
chown -R "${USERNAME}:${USERNAME}" "${USER_HOME}"
