## Meedu视频付费点播系统（一键部署脚本）

![](https://ww1.sinaimg.cn/large/007i4MEmgy1g1xhs2jzsqj30je04w0sw.jpg)
## 一键安装脚本（适配centos7）

```
bash <(curl -L -s https://raw.githubusercontent.com/Baiyuetribe/meedu/master/meedu.sh)
```

![](https://ww1.sinaimg.cn/large/007i4MEmgy1g21cyyxpvgj32gs2gsh7e.jpg)

或者使用本站一键脚本，输入702选项即可。
```
bash <(curl -L -s https://raw.githubusercontent.com/Baiyuetribe/baiyue_onekey/master/go.sh)
```

**备注：** 一键脚本基于Docker环境，兼容宝塔，已包括所有手动安装步骤，其中队列监听暂未设置（也就是手动部署：步骤十）。

## 手动部署：

https://github.com/Qsnh/meedu/blob/master/docs/%E5%AE%89%E8%A3%85%E6%95%99%E7%A8%8B.md

## 版本介绍

Release v1.1.2 - Fixed:页面加速导致的支付界面二维码无法支付

## 功能介绍

- 无需任何基础，自动部署完成一个开源免费的付费视频系统

- 拥有完善的注册、登陆、支付系统、视频OSS、会员系统等等

## 截图

![](https://img.baiyue.one/upload/2019/07/5d3da4ab1e6f5.png)

![](https://img.baiyue.one/upload/2019/07/5d3da4b59a3ba.png)

参考来源：
https://github.com/Qsnh/meedu
