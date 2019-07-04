#!/bin/bash                                                                                               
#===================================================================#
#   System Required:  CentOS 7                                      #
#   Description: Install rrshare for CentOS7                        #
#   Author: Azure <2894049053@qq.com>                               #
#   github: @baiyutribe <https://github.com/baiyuetribe>            #
#   Blog:  佰阅部落 https://baiyue.one                               #
#===================================================================#
#
#  .______        ___       __  ____    ____  __    __   _______      ______   .__   __.  _______ 
#  |   _  \      /   \     |  | \   \  /   / |  |  |  | |   ____|    /  __  \  |  \ |  | |   ____|
#  |  |_)  |    /  ^  \    |  |  \   \/   /  |  |  |  | |  |__      |  |  |  | |   \|  | |  |__   
#  |   _  <    /  /_\  \   |  |   \_    _/   |  |  |  | |   __|     |  |  |  | |  . `  | |   __|  
#  |  |_)  |  /  _____  \  |  |     |  |     |  `--'  | |  |____  __|  `--'  | |  |\   | |  |____ 
#  |______/  /__/     \__\ |__|     |__|      \______/  |_______|(__)\______/  |__| \__| |_______|
#
#一键脚本
#
#
# 设置字体颜色函数
function blue(){
    echo -e "\033[34m\033[01m $1 \033[0m"
}
function green(){
    echo -e "\033[32m\033[01m $1 \033[0m"
}
function greenbg(){
    echo -e "\033[43;42m\033[01m $1 \033[0m"
}
function red(){
    echo -e "\033[31m\033[01m $1 \033[0m"
}
function redbg(){
    echo -e "\033[37;41m\033[01m $1 \033[0m"
}
function yellow(){
    echo -e "\033[33m\033[01m $1 \033[0m"
}
function white(){
    echo -e "\033[37m\033[01m $1 \033[0m"
}
#            
# @安装docker
install_docker() {
    docker version > /dev/null || curl -fsSL get.docker.com | bash 
    service docker restart 
    systemctl enable docker  
}
install_docker_compose() {
	curl -L "https://github.com/docker/compose/releases/download/1.23.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
	chmod +x /usr/local/bin/docker-compose
}


# 单独检测docker是否安装，否则执行安装docker。
check_docker() {
	if [ -x "$(command -v docker)" ]; then
		echo "docker is installed"
		# command
	else
		echo "Install docker"
		# command
		install_docker
	fi
}
check_docker_compose() {
	if [ -x "$(command -v docker-compose)" ]; then
		echo "docker-compose is installed"
		# command
	else
		echo "Install docker-compose"
		# command
		install_docker_compose
	fi
}


# check docker


# 以上步骤完成基础环境配置。
echo "恭喜，您已完成基础环境安装，可执行安装程序。"

restart_meedu(){
    cd /opt/meedu
    docker-compose restart
}



# 输出结果
notice(){
    green "=================================================="
    green "主程序已搭建完毕，让我们来完成最后几步，之后就可以访问了"
    green "=================================================="
    white "以下内容必须一步步操作"
    greenbg "等待数据库完成初始化，等待约10s"
    sleep 12s
    yellow "创建软链接"
    docker-compose exec meedu php artisan storage:link
    sleep 2s
    yellow "安装数据表"
    docker-compose exec meedu chmod -R  0777 storage
    docker-compose exec meedu php artisan migrate   
    sleep 9s
    yellow "初始化系统权限"
    docker-compose exec meedu php artisan install role    
    sleep 6s
    yellow "初始化后台菜单"
    docker-compose exec meedu php artisan install backend_menu   
    sleep 6s
    yellow "生成安装锁"
    docker-compose exec meedu php artisan install:lock  
    yellow "定时任务"
    echo "* * * * * docker-compose exec meedu php artisan schedule:run >> /dev/null 2>&1" >> /var/spool/cron/root
    service crond reload 
    greenbg "正在重启meedu"
    restart_meedu
    sleep 10s
}

notice2(){
    greenbg "初始化管理员"
    docker-compose exec meedu php artisan install administrator    #初始化管理员，安装提示输入管理员的账号和密码
    green "=================================================="
    green "搭建成功，现在您可以直接访问了"
    green "---------------------------"
    green " 首页地址： http://ip:3003"
    green " 后台地址：http://ip:3003/backend/login"
    green " 文件管理器：http://ip:999"
    green "---------------------------"
    white "其他信息"
    white "网页源文件路径：/opt/meedu/code"
    white "数据库存储路径：/opt/meedu/mysql"
    green "=================================================="
    white "Dcocker by 佰阅部落  https://baiyue.one"
    white "Docker版问题反馈地址：https://github.com/Baiyuetribe/meedu/pulls"
}

# 开始安装meedu
install_main(){
    blue "获取配置文件"
    mkdir -p /opt/meedu && cd /opt/meedu
    rm -f docker-compose.yml  
    wget https://raw.githubusercontent.com/Baiyuetribe/meedu/master/docker-compose.yml      
    blue "配置文件获取成功"
    greenbg "首次启动会拉取镜像，国内速度比较慢，请耐心等待完成"
    docker-compose up -d
    notice
    notice2
    echo
 
}



# 停止服务
stop_meedu(){
    cd /opt/meedu
    docker-compose kill
}

# 重启服务
restart_meedu(){
    cd /opt/meedu
    docker-compose restart
}

# 卸载
remove_all(){
    cd /opt/meedu
    docker-compose down
	echo -e "\033[32m已完成卸载\033[0m"
}



#开始菜单
start_menu(){
    clear
	echo "


  ██████╗  █████╗ ██╗██╗   ██╗██╗   ██╗███████╗    ██████╗ ███╗   ██╗███████╗
  ██╔══██╗██╔══██╗██║╚██╗ ██╔╝██║   ██║██╔════╝   ██╔═══██╗████╗  ██║██╔════╝
  ██████╔╝███████║██║ ╚████╔╝ ██║   ██║█████╗     ██║   ██║██╔██╗ ██║█████╗  
  ██╔══██╗██╔══██║██║  ╚██╔╝  ██║   ██║██╔══╝     ██║   ██║██║╚██╗██║██╔══╝  
  ██████╔╝██║  ██║██║   ██║   ╚██████╔╝███████╗██╗╚██████╔╝██║ ╚████║███████╗
  ╚═════╝ ╚═╝  ╚═╝╚═╝   ╚═╝    ╚═════╝ ╚══════╝╚═╝ ╚═════╝ ╚═╝  ╚═══╝╚══════╝                                                            
    "
    greenbg "==============================================================="
    greenbg "简介：MeEdu一键安装脚本                                          "
    greenbg "系统：Centos7、Ubuntu、Debian等                                  "
    greenbg "脚本作者：Azure  QQ群：635925514                                 "
    greenbg "程序开发者：小腾 Github:Qsnh/meedu                               "
    greenbg "网站： https://baiyue.one                                       "
    greenbg "说明：程序集成MeEdu（主程序）+mysql（数据库）+kodexplore(文件管理)  "
    greenbg "Youtube/B站： 佰阅部落                                          "
    greenbg "==============================================================="
    echo
    yellow "使用前提：脚本会自动安装docker，国外服务器搭建只需1min~2min"
    yellow "国内服务器下载镜像稍慢，请耐心等待"
    blue "备注：非80端口可以用caddy反代，自动申请ssl证书，到期自动续期"
    echo
    white "—————————————程序安装——————————————"
    white "1.安装meedu"
    white "—————————————杂项管理——————————————"
    white "2.停止meedu"
    white "3.重启meedu"
    white "4.卸载meedu"
    white "5.清除本地缓存（仅限卸载后操作）"
    white "—————————————域名访问——————————————" 
    white "6.Caddy域名反代一键脚本(可以实现非80端口使用域名直接访问)"
    blue "0.退出脚本"
    echo
    echo
    read -p "请输入数字:" num
    case "$num" in
    1)
	check_docker
    check_docker_compose
    install_main
	;;
	2)
    stop_meedu
    green "meedu程序已停止运行"
	;;
	3)
    restart_meedu
    green "meedu程序已重启完毕"
	;;
	4)
    remove_all
	;;
	5)
    rm -fr /opt/meedu
    green "清除完毕"
	;;    
	6)
    bash <(curl -L -s https://raw.githubusercontent.com/Baiyuetribe/codes/master/caddy/caddy.sh)
	;;
	0)
	exit 1
	;;
	*)
	clear
	echo "请输入正确数字"
	sleep 5s
	start_menu
	;;
    esac
}

start_menu
