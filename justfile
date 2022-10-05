build:
    php ./portable.php > index.html

getdeps:
    curl  https://raw.githubusercontent.com/cadars/portable-php/main/dependencies/Parsedown.php > dependencies/Parsedown.php
    curl  https://raw.githubusercontent.com/cadars/portable-php/main/dependencies/ParsedownExtra.php > dependencies/ParsedownExtra.php
    curl  https://raw.githubusercontent.com/cadars/portable-php/main/dependencies/ParsedownExtraPlugin.php > dependencies/ParsedownExtraPlugin.php
    curl  https://raw.githubusercontent.com/cadars/portable-php/main/portable.php > portable.php

addrss:
    curl https://gist.githubusercontent.com/cadars/c1c2d4bad67e176ef833511385bc888c/raw/c121e1fec5351df7c92707bf19f1693e98c24076/portable-feed.php > portable-feed.php