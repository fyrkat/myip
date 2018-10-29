prefix=/usr/local

myip:

install: myip
	mkdir -p $(prefix)/www/myip/www/dns/ptr
	mkdir -p $(prefix)/www/myip/www/ico
	mkdir -p $(prefix)/www/myip/src/fyrkat/myip/generator
	install -m 0644 www/*.php $(prefix)/www/myip/www
	install -m 0644 www/*.png $(prefix)/www/myip/www
	install -m 0644 www/*.txt $(prefix)/www/myip/www
	install -m 0644 www/dns/*.php $(prefix)/www/myip/www/dns
	install -m 0644 www/dns/ptr/*.php $(prefix)/www/myip/www/dns/ptr
	install -m 0644 www/ico/*.png $(prefix)/www/myip/www/ico
	install -m 0644 src/*.php $(prefix)/www/myip/src
	install -m 0644 src/fyrkat/myip/*.php $(prefix)/www/myip/src/fyrkat/myip
	install -m 0644 src/fyrkat/myip/generator/*.php $(prefix)/www/myip/src/fyrkat/myip/generator

freebsdrc: install
	pkg install -y lighttpd php72-json php72-zlib
	install -m 0644 dist/etc/lighttpd/myip.conf $(prefix)/etc/lighttpd
	sysrc lighttpd_enable="YES"
	sysrc lighttpd_instances+="myip"
	sysrc lighttpd_myip_conf="/usr/local/etc/lighttpd/myip.conf"
	sysrc lighttpd_myip_pidfile="/var/run/lighttpd_myip.pid"
	sysrc local_unbound_enable=yes
