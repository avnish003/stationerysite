function initSPPageBuilderGMap(p){jQuery(".sppb-addon-gmap-canvas",p).each(function(t){var a=jQuery(this).attr("id"),e=Number(jQuery(this).attr("data-mapzoom")),o=jQuery(this).attr("data-infowindow"),n="true"===jQuery(this).attr("data-mousescroll"),r=jQuery(this).attr("data-maptype"),i={lat:Number(jQuery(this).attr("data-lat")),lng:Number(jQuery(this).attr("data-lng"))},d=new google.maps.Map(p.getElementById(a),{center:i,zoom:e,scrollwheel:n}),u=new google.maps.Marker({position:i,map:d});if(o){o=new google.maps.InfoWindow({content:atob(o)});u.addListener("click",function(){o.open(d,u)})}d.setMapTypeId(google.maps.MapTypeId[r])})}jQuery(window).load(function(){initSPPageBuilderGMap(document)});