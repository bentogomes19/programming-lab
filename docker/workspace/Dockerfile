# syntax=docker/dockerfile:1.7

FROM ubuntu:24.04

ARG DEBIAN_FRONTEND=noninteractive
ARG USERNAME=dev
ARG USER_UID=1000
ARG USER_GID=1000

ENV TZ=America/Sao_Paulo \
    LANG=pt_BR.UTF-8 \
    LC_ALL=pt_BR.UTF-8 \
    DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        ca-certificates curl wget git openssh-client \
        zsh sudo locales tzdata \
        nano vim less man-db procps tree jq \
        unzip zip make \
        php-cli php-mbstring php-xml php-curl php-zip php-intl php-bcmath php-xdebug composer \
        python3 python3-pip python3-venv \
        openjdk-21-jdk maven \
        build-essential gcc g++ gdb cmake \
    && locale-gen pt_BR.UTF-8 \
    && EXISTING_GROUP="$(getent group "${USER_GID}" | cut -d: -f1 || true)" \
    && if [ -n "${EXISTING_GROUP}" ] && [ "${EXISTING_GROUP}" != "${USERNAME}" ]; then \
        groupmod --new-name "${USERNAME}" "${EXISTING_GROUP}"; \
       elif [ -z "${EXISTING_GROUP}" ]; then \
        groupadd --gid "${USER_GID}" "${USERNAME}"; \
       fi \
    && EXISTING_USER="$(getent passwd "${USER_UID}" | cut -d: -f1 || true)" \
    && if [ -n "${EXISTING_USER}" ] && [ "${EXISTING_USER}" != "${USERNAME}" ]; then \
        usermod \
            --login "${USERNAME}" \
            --home "/home/${USERNAME}" \
            --move-home \
            --shell /usr/bin/zsh \
            "${EXISTING_USER}"; \
       elif [ -z "${EXISTING_USER}" ]; then \
        useradd \
            --uid "${USER_UID}" \
            --gid "${USER_GID}" \
            --create-home \
            --shell /usr/bin/zsh \
            "${USERNAME}"; \
       else \
        usermod --shell /usr/bin/zsh "${USERNAME}"; \
       fi \
    && echo "${USERNAME} ALL=(ALL) NOPASSWD:ALL" > "/etc/sudoers.d/${USERNAME}" \
    && chmod 0440 "/etc/sudoers.d/${USERNAME}" \
    && rm -rf /var/lib/apt/lists/*

COPY --chmod=755 docker/workspace/setup-shell.sh /usr/local/bin/setup-shell.sh
COPY docker/workspace/.zshrc /tmp/workspace.zshrc

RUN { \
        echo "xdebug.mode=debug"; \
        echo "xdebug.start_with_request=yes"; \
        echo "xdebug.client_host=host.docker.internal"; \
        echo "xdebug.client_port=9003"; \
        echo "xdebug.idekey=PHPSTORM"; \
        echo "xdebug.log=/tmp/xdebug.log"; \
        echo "xdebug.log_level=7"; \
    } > /etc/php/8.3/cli/conf.d/99-xdebug.ini

RUN /usr/local/bin/setup-shell.sh "${USERNAME}" \
    && install -o "${USERNAME}" -g "${USERNAME}" -m 0644 /tmp/workspace.zshrc "/home/${USERNAME}/.zshrc" \
    && rm /tmp/workspace.zshrc

WORKDIR /workspace

USER ${USERNAME}

CMD ["zsh"]