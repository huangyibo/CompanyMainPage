

## 说明
活动发布平台v0.1

## 运行环境

- Nginx 1.8+
- PHP 5.6+
- Mysql 5.7+
- Redis 3.0+
- Memcached 1.4+

## 开发环境部署/安装

本项目代码使用 PHP 框架 [Laravel 5.1]开发。

### 基础安装

#### 1. 克隆源代码

克隆源代码到本地：

    > git clone https://git.coding.net/bobohuang_sun/ActivityRelease.git

#### 2. 配置本地的 Homestead 环境

1). 运行以下命令编辑 Homestead.yaml 文件：

```shell
homestead edit
```

2). 加入对应修改，如下所示：

```
folders:
    - map: ~/my-path/news.laravel-china.org/ # 你本地的项目目录地址
      to: /home/vagrant/news.laravel-china.org

sites:
    - map: news.app
      to: /home/vagrant/news.laravel-china.org/public

databases:
    - news
```

3). 应用修改

修改完成后保存，然后执行以下命令应用配置信息修改：

```shell
homestead provision
```

> 注意：有时候你需要重启才能看到应用。运行 `homestead halt` 然后是 `homestead up` 进行重启。

#### 3. 安装扩展包依赖

    > composer install

#### 4. 使用安装命令

虚拟机里面：

```shell
php artisan est:instal
```

> 更多信息，请查阅 ESTInstallCommand

#### 5. 配置 hosts 文件


### 链接入口

* 首页地址：http://127.0.0.1/
* 管理后台：http://127.0.0.1/admin

 

### 6. 前端工具集安装

1). 安装 node.js

直接去官网 [https://nodejs.org/en/](https://nodejs.org/en/) 下载安装最新版本。

2). 安装 Gulp

```shell
npm install --global gulp
```

3). 安装 Laravel Elixir

```shell
npm install
```

4). 直接 Gulp 编译前端内容

```shell
gulp
```

5). 监控修改并自动编译

```shell
gulp watch
```

至此, 安装完成


| 命令行名字 | 说明 |
| --- | --- | --- | --- |
| `est: install` | 安装必备，首次安装时调用此命令可以快速初始化项目 |
| `est:reinstall` | 开发必备，重置所有的数据库和用户权限 |

## 使用协议

基于 MIT 协议基础上，增加署名权。请在你的修改版本站点底部保留：

