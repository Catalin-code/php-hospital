<?php 
    session_start();
    include("./include/connection.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP-Hospital</title>
</head>
<body>
    <?php
        include("include/header.php");
    ?>

    <script src="https://emgithub.com/embed-v2.js?target=https%3A%2F%2Fgithub.com%2FCatalin-code%2Fphp-hospital%2Fblob%2Fmain%2FREADME.md&style=default&type=markdown&showBorder=on&showLineNumbers=on&showFileMeta=on&showFullPath=on&showCopy=on"></script>

    <div class="mxgraph" style="max-width:100%;border:1px solid transparent;" data-mxgraph="{&quot;highlight&quot;:&quot;#0000ff&quot;,&quot;nav&quot;:true,&quot;resize&quot;:true,&quot;toolbar&quot;:&quot;zoom layers tags lightbox&quot;,&quot;edit&quot;:&quot;_blank&quot;,&quot;xml&quot;:&quot;&lt;mxfile host=\&quot;app.diagrams.net\&quot; modified=\&quot;2023-02-04T18:38:52.328Z\&quot; agent=\&quot;5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36\&quot; etag=\&quot;qQLnFkAyquH2dkvFWK0b\&quot; version=\&quot;20.0.1\&quot; type=\&quot;device\&quot;&gt;&lt;diagram id=\&quot;VIzpsE4BPggW6e5WPzXO\&quot; name=\&quot;Page-1\&quot;&gt;7Zxdc9o4FIZ/DZfdwV9ALgkkm2zTlE3S7e7VjoIF1ka2qCxC6K/vEZYhzoEMZTDybDXDZNCxbCy9j2ydV5q0gkH68rsks+STiClv+e34pRUMW77vhb7f0p92vCwi3V6nCEwli02lTeCefacm2DbROYtpXqmohOCKzarBscgyOlaVGJFSLKrVJoJXf3VGphQF7seE4+hXFqukiPb87iZ+Rdk0KX/Z65wVR1JSVjYtyRMSi8WrUHDRCgZSCFV8S18GlOvOK/ulOO9yx9H1jUmaqX1O+Jd1Hj9/Cxd384eLq+RPv/1Hu//BXOWZ8LlpMIlTlpk7VsuyG/IFSznJoHQ+EZm6N0c8KBPOphl8H8N9UAmBZyoVgx7smwNKzCA6ThiPb8hSzPXd5oqMn8rSeSIk+w6XJdxcEw5LZWDwO5Ua9/pMCLchKmkOdUZlF3hvQp/IS6XiDcmVCYwF52SWs8d1M1Iipyw7F0qJ1FQyfQPNoS87O91bSwljgIqUKrmEKuaEnhHf0B+a4mKDUlDykbzGqBMahA2+0/WVNwrDFyPyTwjuI8GvoXofQte3Dy0fLtoeSQadoRvxRJdF6BYghb9zfX1d/pKxb3D+6nt/roQ+PRtLmmoGYkQP9J9aqSrFEx0ILgCTYSYKnBjnb0IlUZxO1E6e8hkZs2x6s6ozDDeRO9ONOiTg3AlfjbqExTHNNAtCEUUK4bXKM8Eyterm6Bw+oMag/VvUioa6edG5tynDR1eXaiAyaAthKwYoULWgmqz9gNk9DjFFBhu/sx82Zb2jUxMhar7kVGYkpQU7f/XvBlf9OwyLA+GoIES+ZRA6CIQRyfOFkLED4ZQgdHuWQegiEC6ZzNWteyScmASvHVpGoYdQ0BMtR8LJSQj2nF3WRkKASEAic7YSrxC5zKi8gxROQStON5I+aMWHHzwke4BlD7ZIzMkj5SORM8WEvr4s6r6R3pq60Z6TwF5dc8AuEpPGkCubInRJIqYiI/xiE4U+nmcxjU0Pb+rciJVYWqv/qFJLk+sRnUtAtqfSMhOELpPLv/X5MLpM8R9zuVVh+FIpLVuvczd9gztFMKFczOWYvtNwk9BDSjql7+kXdrcLKCknij1Xb+To8pyhsReLsYLh5FL546TyYXhYLu+Hfk2Slx6ZS+ab9Zo+e/dBbj2Z97Dp57J5GyRYz+Y97Aa6dN4GCdbTeQ9P3V0+bwUF+/m8FyIWXEJvBQXrCb2H/d6LlDDuODgpB/um/vVxgO3eUQJq3c7TR50oOhpOSEPP+rQRO76XjPL48+SrkE/X2+aOl0LCnWUft+Wgjo/j5pdt65NJvFyMVHY+8KHyBnvOD+vygT3sNM6IYrpNzmo8jtXYax9oNXp1DWnfWY2NfBV4Dfcafec1NgQF62ZjOQlwZqNtFKy7jb5zG5vCgn270Xd2Y1NYsO43+s5vbAQI1g1H3xmODcLBuuPoO0epzixxX8ewtq2FPaSmxa2F62P1by0MzGOu4XsLA/w0LjYXktmMw8DRWOdIQuf+Heb+vd1oGHWs7zQM8IqPs/8a8OIOdjwWmmL/BXitwNl/VlCwbv+FeAXB2X9WULBu/4V4UcDZf3ZYsG//lXMWZ/9ZZ8G6/RfidQFn/1kAwbr9F+I1AWf/WcPBuv0XYvvPbThsDiD2dxyGeN0Iyez84YP1tb3lMMT+40SPfzGB9PEJKe2Mx+MYj0Fvzwlhr7Zx7XzHRr4Qdi1HNMV3DLHv6BLKk2Ng3XOM3LSgRnn39RFrWzXGg/zyYzHEq9nBjoH9ain4Z8f4zunDGoFFwhS9B431by4kmbXerlgf44Xdrb6w/S0vbC/aIknp9Bz//wNil/8X1yTa4qqdWBNst4+MJv9nIaKoKkTYwbOSEwuBre5fUYggqm9EQHHzH7VXx179X/Lg4gc=&lt;/diagram&gt;&lt;/mxfile&gt;&quot;}"></div>
    <script type="text/javascript" src="https://viewer.diagrams.net/js/viewer-static.min.js"></script>
</body>
</html>