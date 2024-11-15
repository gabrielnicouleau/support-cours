################################################################
### Script de configuration d'environnement de developpement ###
################################################################

# Description: Ce script permet de configurer l'environnement de developpement
# dont vous aurez besoin pour travailler sur le projet.

#!/bin/bash

### Variables

# Variables de configuration systeme
projet_NAME="ProjetDev"
dev_USER=""
dev_PASS=""
dev_SHELL="/bin/bash"
dev_GROUP="sudo www-data"

# Variables de configuration Git
#git_repo=""
#git_distant_branch=""
#git_local_branch=""
#git_user=""
#git_email=""

# Variables de configuration Apache
site_CONF="$projet_NAME.conf"
site_PORT="80"

### Fonctions

# Paquets
check_PACKAGE() {
    echo -e "### Installation de 'git curl openssh-server apache2 tree' ###\n"
    apt install -y git curl openssh-server apache2 tree &>/dev/null
    echo -e "### Installation de 'git curl openssh-server apache2 tree' terminee ###\n"
}

# Utilisateur
check_USER() {
    if id $dev_USER &>/dev/null; then
        echo -e "\n### L'utilisateur $dev_USER existe deja ###\n"
    else
        declare -g dev_PATH="/var/www/html"
        useradd -m -d $dev_PATH -s $dev_SHELL $dev_USER
        echo "$dev_USER:$dev_PASS" | chpasswd
        for group in $dev_GROUP; do
            usermod -aG $group $dev_USER
        done
        echo -e "\n### Creation de l'utilisateur $dev_USER terminée ###\n"
    fi
}
check_PASS() {
    if [ $dev_PASS != $dev_PASS2 ]; then
        echo -e "\n### Les mots de passe ne correspondent pas ###\n"
        exit 1
    fi
}
# Git
#check_GIT() {
#    echo -e "\n### Initialisation du depot Git ###\n"
#   su - $dev_USER -c "
#        git config --global user.name $git_user
#        git config --global user.email $git_email
#        git init
#        git remote add origin $git_repo
#        git pull origin $git_distant_branch
#        git checkout -b $git_local_branch
#        
#    "
#}

# Apache
check_APACHE() {
    if [ -d $site_PATH ]; then
        echo -e "\n### Configuration du site Apache ###\n"
        echo -e "<VirtualHost *:$site_PORT>\n\tDocumentRoot $dev_PATH\n</VirtualHost>" > /etc/apache2/sites-available/$site_CONF
        a2dissite 000-default.conf
        a2ensite $site_CONF
        systemctl reload apache2
    else
        echo -e "\n### Le repertoire $site_PATH n'existe pas ###\n"
    fi
}

### Configuration de l'environnement

# Installation des packages
apt update
check_PACKAGE

# Creation de l'utilisateur
read -p "Entrez votre nom de developpeur: " dev_USER
read -s -p "Entrez votre nouveau mot de passe: " dev_PASS
echo
read -s -p "Confirmez votre mot de passe : " dev_PASS2
echo
check_PASS
check_USER

# Configuration de Git
#read -p "Entrez l'URL du depot Git: " git_repo
#read -p "Entrez la branche distante: " git_distant_branch
#read -p "Entrez la branche locale: " git_local_branch
#read -p "Entrez votre nom d'utilisateur Git: " git_user
#read -p "Entrez votre adresse email Git: " git_email
#check_GIT

# Configuration d'Apache
check_APACHE

echo -e "\n### Configuration terminee ###"
echo -e "\n### Vous pouvez vous connecter en SSH avec l'utilisateur $dev_USER ###\n### et le mot de passe que vous avez defini ###\n"
echo -e "\n### Vous pouvez acceder au site Apache a l'adresse http://IP_VM ###\n"
echo -e "\n### Bon développement ###\n"