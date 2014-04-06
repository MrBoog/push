push
====

php push demo for mac。

demo是用php实现的，实现了基本的推送功能。

先获取设备的deviceToken。

然后生成develop和product环境下相应的pem证书，如：apns_dev.pem，apns_pro.pem。

再在mac下开启apache服务，配置相应的php环境。

最后clone该demo。将clone下来的push文件夹，放置在系统web根目录，既：/Library/WebServer/Documents目录下。
将生成后的pem证书也覆盖到该目录下，替换原来的pem。

最后通过浏览器访问http://localhost/push/apns_form.php，填写相应的deviceToken，即可发布推送。
