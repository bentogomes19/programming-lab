# Shell do laboratório de estudos
export ZSH="/opt/oh-my-zsh"
export ZSH_CUSTOM="${ZSH}/custom"

ZSH_THEME="agnoster"

plugins=(
  git
  docker
  docker-compose
  composer
  python
  pip
  mvn
  command-not-found
  colored-man-pages
)

source "${ZSH}/oh-my-zsh.sh"

# O syntax-highlighting deve ser carregado ao final.
source "${ZSH_CUSTOM}/plugins/zsh-autosuggestions/zsh-autosuggestions.zsh"
source "${ZSH_CUSTOM}/plugins/zsh-syntax-highlighting/zsh-syntax-highlighting.zsh"

export EDITOR=nano
export VISUAL=nano
export LANG=pt_BR.UTF-8
export LC_ALL=pt_BR.UTF-8
export HISTFILE="${HOME}/.zsh_history"
export HISTSIZE=10000
export SAVEHIST=10000

setopt HIST_IGNORE_DUPS
setopt SHARE_HISTORY
setopt AUTO_CD

alias ll='ls -lah --color=auto'
alias la='ls -A --color=auto'
alias gs='git status'
alias ga='git add'
alias gc='git commit'
alias gp='git push'
alias gl='git log --oneline --decorate --graph --all'
alias ..='cd ..'
alias ...='cd ../..'

# Configura user.name/user.email somente com valores recebidos do .env local.
# Nenhuma credencial GitHub é guardada aqui.
if command -v workspace-git-config >/dev/null 2>&1; then
    workspace-git-config
fi

echo "🧪 Programming Lab | PHP • Python • Java • C/C++"
