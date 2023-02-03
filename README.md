<p align="center">
  <h3 align="center">YueShengShiAutoDeclare</h3>

  <p align="center">
    粤省事健康码自动申报，2020年初开发的，现已废弃
    <br/>
    <br/>
  </p>
![Contributors](https://img.shields.io/github/contributors/jonyandunh/YueShengShiAutoDeclare?color=dark-green) ![Forks](https://img.shields.io/github/forks/jonyandunh/YueShengShiAutoDeclare?style=social) ![Stargazers](https://img.shields.io/github/stars/jonyandunh/YueShengShiAutoDeclare?style=social) ![Issues](https://img.shields.io/github/issues/jonyandunh/YueShengShiAutoDeclare) ![License](https://img.shields.io/github/license/jonyandunh/YueShengShiAutoDeclare) 

## 网页截图

![Screen Shot](https://github.com/JonyanDunh/YueShengShiAutoDeclare/blob/master/images/preview.jpg?raw=true)


## 项目框架

前端为普普通通的`HTML5`，后端为`PHP`

## 使用教程

#### 抓包过程

1.打开抓包软件

2.抓包软件开启https抓取,然后安装证书

3.打开粤省事小程序

4.进入粤康码界面

5.开启抓包

6.进入健康情况申报

7.关闭抓包

#### 分析数据包

1.找到 https://zwms.gdbs.gov.cn/api/oss/miniprogramreport 这个请求

2.然后来到请求头(Request Header),可以看到请求头中包含**x-tif-did** | **x-tif-sid** 这两个变量,这两个变量的值就是我们要找的did和sid,我们把他记下来

3.最后去到请求主体(body或data),找到**openid**这个变量,然后把他的值记下来,这个就是openid
