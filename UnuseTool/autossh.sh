expect ssh.login.exp 127.0.0.1 $1     $2     'logout'
#                      ip      id   passwd    cmd
if [ $(echo $?) != "0" ];then
  exit 0
fi
  exit 1
