## JwcTool 教学小助手

### 推荐环境
 - Apahce
 - PHP >= 7.1 （低于7.1项目依赖会出错）
 - Mysql >= 5.7 （未测试低版本Mysql）

### 安装
解压即可

### 配置hosts域名解析
在hosts文件中加入一行
```
# 后台进行了顶级域名过滤，推荐使用.test
127.0.0.1 jwctool.test
```

或

右键使用管理员运行 `addToHosts.bat` 文件


### 导入SQL
项目依赖两个数据库，分别为 `jwc` 和 `jwcdb`，需要手动创建这两个数据库，再将数据库导入。

- `jwc` 数据库为教务在线原始数据，原则上只读。
- `jwcdb`数据库为项目前后台数据库。

### Apache服务器配置
视情况配置项目路径，项目目录为 `/public`
```
# 配置参考
<VirtualHost *:80>
  ServerName jwctool.test
  ServerAlias jwctool.test
  DocumentRoot "F:/php/190301-jwctool/jwctool/public"
  <Directory "F:/php/190301-jwctool/jwctool/public/">
    Options +Indexes +Includes +FollowSymLinks +MultiViews
    AllowOverride All
    Require local
  </Directory>
</VirtualHost>
```

### 重启Apache
重启后访问 [http://jwctool.test](http://jwctool.test)