/* share42.com | 07.05.2016 | (c) Dimox */
(function($) {
    $(function() {
        $('[data-toggle="social"]').each(function(idx) {
            var el = $(this),
                u = el.attr('data-url'),
                t = el.attr('data-title'),
                i = el.attr('data-image'),
                d = el.attr('data-description'),
                f = el.attr('data-path'),
                fn = el.attr('data-icons-file'),
                z = el.attr("data-zero-counter");
            if (!u) u = location.href;
            if (!fn) fn = 'icons.png';
            if (!z) z = 0;
            if (!f) {
                function path(name) {
                    var sc = document.getElementsByTagName('script'),
                        sr = new RegExp('^(.*/|)(' + name + ')([#?]|$)');
                    for (var p = 0, scL = sc.length; p < scL; p++) {
                        var m = String(sc[p].src).match(sr);
                        if (m) {
                            if (m[1].match(/^((https?|file)\:\/{2,}|\w:[\/\\])/)) return m[1];
                            if (m[1].indexOf("/") == 0) return m[1];
                            b = document.getElementsByTagName('base');
                            if (b[0] && b[0].href) return b[0].href + m[1];
                            else return document.location.pathname.match(/(.*[\/\\])/)[0] + m[1];
                        }
                    }
                    return null;
                }
                f = path('share42.js');
            }
            if (!t) t = document.title;
            if (!d) {
                var meta = $('meta[name="description"]').attr('content');
                if (meta !== undefined) d = meta;
                else d = '';
            }
            u = encodeURIComponent(u);
            t = encodeURIComponent(t);
            t = t.replace(/\'/g, '%27');
            i = encodeURIComponent(i);
            d = encodeURIComponent(d);
            d = d.replace(/\'/g, '%27');
            var vkImage = '';
            if (i != 'null' && i != '') vkImage = '&image=' + i;
            var s = new Array(
				'"#" data-count="vk" onclick="window.open(\'//vk.com/share.php?url=' + u + '&title=' + t + vkImage + '&description=' + d + '\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Поделиться В Контакте"',
				'"#" data-count="fb" onclick="window.open(\'//www.facebook.com/sharer/sharer.php?u=' + u + '\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Поделиться в Facebook"', 
				'"#" data-count="twi" onclick="window.open(\'//twitter.com/intent/tweet?text=' + t + '&url=' + u + '\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Добавить в Twitter"', 
				'"#" data-count="mail" onclick="window.open(\'//connect.mail.ru/share?url=' + u + '&title=' + t + '&description=' + d + '&imageurl=' + i + '\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Поделиться в Моем Мире@Mail.Ru"', 
				'"#" data-count="odkl" onclick="window.open(\'//ok.ru/dk?st.cmd=addShare&st._surl=' + u + '&title=' + t + '\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Добавить в Одноклассники"'
			);
			
			var cl = new Array(
				'vk',
				'facebook',
				'twitter',
				'at',
				'odnoklassniki'
			);
			
			var icons = new Array(
				'fab fa-vk',
				'fab fa-facebook-f',
				'fab fa-twitter',
				'fas fa-at',
				'fab fa-odnoklassniki'
			);
			
            var l = '<ul class="social-list">';
            for (j = 0; j < s.length; j++) l += '<li><noindex><a rel="nofollow" href=' + s[j] + ' target="_blank" class="social-icon _' + cl[j] + '"><i class="fa5 ' + icons[j] + '"></i></a></noindex></li>';
            el.html(l + '</ul>');
        })
    })
})(jQuery);