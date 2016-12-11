
#coding=utf-8
import urllib.request
import re

def getHtml(url):
    page = urllib.request.urlopen(url)
    html = page.read()
    html =html.decode('utf-8')
    return html

def getImg(html):
    reg = r'src="https://img3.doubanio.com/view/movie_poster_cover/lpst/public/(.+?\.jpg)"'
    imgre = re.compile(reg)
    print(imgre)
    imglist = re.findall(imgre,html)
    x = 0
    for imgurl in imglist:
        imgurl ="https://img3.doubanio.com/view/movie_poster_cover/lpst/public/" + imgurl
        urllib.request.urlretrieve(imgurl,'%s.jpg' % x)
        x+=1


html = getHtml("https://movie.douban.com/")

print (getImg(html))