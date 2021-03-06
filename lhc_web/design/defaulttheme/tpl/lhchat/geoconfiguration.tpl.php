<h1><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','GEO detection configuration');?></h1>

<?php if (isset($errors)) : ?>
	<?php include(erLhcoreClassDesign::designtpl('lhkernel/validation_error.tpl.php'));?>
<?php endif; ?>

<?php if (isset($updated) && $updated == 'done') : $msg = erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Settings updated'); ?>
	<?php include(erLhcoreClassDesign::designtpl('lhkernel/alert_success.tpl.php'));?>
<?php endif; ?>


<div class="section-container auto" data-section>
  <section class="active">
    <p class="title" data-section-title><a href="#"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','GEO detection configuration');?></a></p>
    <div class="content" data-section-content>

    <div>
    <form action="" method="post">

<?php include(erLhcoreClassDesign::designtpl('lhkernel/csfr_token.tpl.php'));?>

<label><input type="checkbox" id="id_GeoDetectionEnabled" name="GeoDetectionEnabled" value="on" <?php isset($geo_data['geo_detection_enabled']) && $geo_data['geo_detection_enabled'] == 1 ? print 'checked="checked"' : ''?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','GEO Enabled');?></label>
<br />

<div class="section-container auto<?php (!isset($geo_data['geo_detection_enabled']) || $geo_data['geo_detection_enabled'] == 0) ? print ' hide' : '' ?>" data-section id="settings-geo">
  <section <?php isset($geo_data['geo_detection_enabled']) && ($geo_data['geo_service_identifier'] == 'freegeoip') ? print 'class="active"' : ''?>>
    <p class="title" data-section-title><a href="#panel1">http://freegeoip.net/static/index.html</a></p>
    <div class="content" data-section-content>
    <div>

      	<label class="inline"><input type="radio" name="UseGeoIP" value="freegeoip" <?php isset($geo_data['geo_detection_enabled']) && ($geo_data['geo_service_identifier'] == 'freegeoip') ? print 'checked="checked"' : '' ?> /><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Use this service'); ?></label>
      	<input type="submit" class="button small round" name="StoreGeoIPConfiguration" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Save'); ?>" />
	</div>
    </div>
  </section>
  <section <?php isset($geo_data['geo_detection_enabled']) && ($geo_data['geo_service_identifier'] == 'mod_geoip2') ? print 'class="active"' : ''?>>
    <p class="title" data-section-title><a href="#panel2">mod_geoip2</a></p>
    <div class="content" data-section-content>
    	<div>
      	<label><input type="radio" name="UseGeoIP" value="mod_geoip2" <?php isset($geo_data['geo_detection_enabled']) && ($geo_data['geo_service_identifier'] == 'mod_geoip2') ? print 'checked="checked"' : '' ?> /><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Use mod_geoip2'); ?></label>
		<br>
        <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Country code server variable'); ?></label>
        <input type="text" name="ServerVariableGEOIP_COUNTRY_CODE" value="<?php isset($geo_data['mod_geo_ip_country_code']) ? print $geo_data['mod_geo_ip_country_code'] : print 'GEOIP_COUNTRY_CODE' ?>">

        <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Country name server variable'); ?></label>
        <input type="text" name="ServerVariableGEOIP_COUNTRY_NAME" value="<?php isset($geo_data['mod_geo_ip_country_name']) ? print $geo_data['mod_geo_ip_country_name'] : print 'GEOIP_COUNTRY_NAME' ?>">

        <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','City name server variable'); ?></label>
        <input type="text" name="ServerVariableGEOIP_CITY" value="<?php isset($geo_data['mod_geo_ip_city_name']) ? print $geo_data['mod_geo_ip_city_name'] : print 'GEOIP_CITY' ?>">

        <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Latitude variable'); ?></label>
        <input type="text" name="ServerVariableGEOIP_LATITUDE" value="<?php isset($geo_data['mod_geo_ip_latitude']) ? print $geo_data['mod_geo_ip_latitude'] : print 'GEOIP_LATITUDE' ?>">

        <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Longitude variable'); ?></label>
        <input type="text" name="ServerVariableGEOIP_LONGITUDE" value="<?php isset($geo_data['mod_geo_ip_longitude']) ? print $geo_data['mod_geo_ip_longitude'] : print 'GEOIP_LONGITUDE' ?>">

        <input type="submit" class="button small round" name="StoreGeoIPConfiguration" value="Save" />
    	</div>
    </div>
  </section>
  
  
  <section <?php isset($geo_data['geo_detection_enabled']) && ($geo_data['geo_service_identifier'] == 'max_mind') ? print 'class="active"' : ''?>>
    <p class="title" data-section-title><a href="#maxmind">MaxMind</a></p>
    <div class="content" data-section-content>
    	<div>
      	<label><input type="radio" name="UseGeoIP" value="max_mind" <?php isset($geo_data['geo_detection_enabled']) && ($geo_data['geo_service_identifier'] == 'max_mind') ? print 'checked="checked"' : '' ?> /><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Use MaxMind, does not depend on any third party remote service'); ?></label>
      	
      	<p><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','You can download city/country database from.'); ?>&nbsp;<a target="_blank" href="http://dev.maxmind.com/geoip/geoip2/geolite2/">MaxMind</a></p>
      	
      	<p>
      	<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','bcmath php extension detected'); ?> - <?php echo extension_loaded ('bcmath' ) ? '<span class="success label round">Yes</span>' : '<span class="round label alert">No</span>'; ?>
      	</p> 
      	
		<br>
		<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Location of city database'); ?></label>		
		<input type="text" name="CityGeoLocation" value="<?php isset($geo_data['max_mind_city_location']) && ($geo_data['max_mind_city_location'] != '') ?  print htmlspecialchars($geo_data['max_mind_city_location']) : print 'var/external/geoip/GeoLite2-City.mmdb' ?>" />
			
		<div class="row">
			<div class="columns small-6"><label><input type="radio" name="MaxMindDetectionType" value="country" <?php (isset($geo_data['max_mind_detection_type']) && $geo_data['max_mind_detection_type'] == 'country') ? print 'checked="checked"' : '' ?> /><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','User country based detection, faster')?></label></div>
			<div class="columns small-6">
				<?php if (file_exists("var/external/geoip/GeoLite2-Country.mmdb")) : ?> <span class="success label round" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','File exists'); ?>">var/external/geoip/GeoLite2-Country.mmdb</span> <?php else : ?><span class="round label alert" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','File does not exists'); ?>">var/external/geoip/GeoLite2-Country.mmdb</span><?php endif;?>
			</div>
		</div>
		<div class="row">
			<div class="columns small-6"><label><input type="radio" name="MaxMindDetectionType" value="city" <?php (isset($geo_data['max_mind_detection_type']) && $geo_data['max_mind_detection_type'] == 'city') ? print 'checked="checked"' : '' ?> <?php if (!file_exists(isset($geo_data['max_mind_city_location']) && ($geo_data['max_mind_city_location'] != '') ?  $geo_data['max_mind_city_location'] : 'var/external/geoip/GeoLite2-City.mmdb')) : ?>disabled<?php endif;?> /><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','User city based detection, slower')?></label></div>
			<div class="columns small-6">
				<?php if (file_exists(isset($geo_data['max_mind_city_location']) && ($geo_data['max_mind_city_location'] != '') ?  $geo_data['max_mind_city_location'] : 'var/external/geoip/GeoLite2-City.mmdb')) : ?> <span class="success label round" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','File exists');?>"><?php isset($geo_data['max_mind_city_location']) && ($geo_data['max_mind_city_location'] != '') ?  print htmlspecialchars($geo_data['max_mind_city_location']) : print 'var/external/geoip/GeoLite2-City.mmdb' ?></span> <?php else : ?><span class="round label alert" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','File does not exists')?>"><?php isset($geo_data['max_mind_city_location']) && ($geo_data['max_mind_city_location'] != '') ?  print htmlspecialchars($geo_data['max_mind_city_location']) : print 'var/external/geoip/GeoLite2-City.mmdb' ?></span><?php endif;?>
			</div>
		</div>
           
         <div class="right">
         <p>This product includes GeoLite2 data created by MaxMind, available from
		<a href="http://www.maxmind.com">http://www.maxmind.com</a>.</p>
         </div>
                
        <input type="submit" class="button small round" name="StoreGeoIPConfiguration" value="Save" />
    	</div>
    </div>
  </section>
  
  <section <?php isset($geo_data['geo_detection_enabled']) && ($geo_data['geo_service_identifier'] == 'php_geoip') ? print 'class="active"' : ''?>>
    <p class="title" data-section-title><a href="#phpgeoip">PHP-GeoIP</a></p>
    <div class="content" data-section-content>
    	<div>
      	<label><input type="radio" name="UseGeoIP" value="php_geoip" <?php isset($geo_data['geo_detection_enabled']) && ($geo_data['geo_service_identifier'] == 'php_geoip') ? print 'checked="checked"' : '' ?> /><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Use PHP-GeoIP module'); ?></label>
            	      	
      	<p><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Support for PHP-GeoIP detected'); ?> - <?php echo function_exists('geoip_country_code_by_name') ? '<span class="success label round">Yes</span>' : '<span class="round label alert">No</span>'; ?></p> 
      	        
        <input type="submit" class="button small round" name="StoreGeoIPConfiguration" value="Save" />
    	</div>
    </div>
  </section>
  
  <section <?php isset($geo_data['geo_detection_enabled']) && ($geo_data['geo_service_identifier'] == 'ipinfodbcom') ? print 'class="active"' : ''?>>
    <p class="title" data-section-title><a href="#panel3">http://ipinfodb.com</a></p>
    <div class="content" data-section-content>

	    <div>
		     <p><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Requests will be comming from');?> - <?php echo erLhcoreClassIPDetect::getServerAddress(); ?></p>
	
		     <label class="inline"><input type="radio" name="UseGeoIP" value="ipinfodbcom" <?php isset($geo_data['geo_detection_enabled']) && ($geo_data['geo_service_identifier'] == 'ipinfodbcom') ? print 'checked="checked"' : '' ?> /><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Use this service'); ?></label>
	
		     <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','API Key'); ?></label>
		     <input type="text" name="ipinfodbAPIKey" value="<?php isset($geo_data['ipinfodbcom_api_key']) ? print htmlspecialchars($geo_data['ipinfodbcom_api_key']) : print '' ?>">
		     
		     <input type="submit" class="button small round" name="StoreGeoIPConfiguration" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Save'); ?>" />
		</div>

    </div>
  </section>
  
  <section <?php isset($geo_data['geo_detection_enabled']) && ($geo_data['geo_service_identifier'] == 'locatorhq') ? print 'class="active"' : ''?>>
    <p class="title" data-section-title><a href="#panel4">http://www.locatorhq.com</a></p>
    <div class="content" data-section-content>

    <div>
	     <p><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Requests will be comming from');?> - <?php echo erLhcoreClassIPDetect::getServerAddress(); ?></p>

	     <label class="inline"><input type="radio" name="UseGeoIP" value="locatorhq" <?php isset($geo_data['geo_detection_enabled']) && ($geo_data['geo_service_identifier'] == 'locatorhq') ? print 'checked="checked"' : '' ?> /><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Use this service'); ?></label>

	     <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','API Key'); ?></label>
	     <input type="text" name="locatorhqAPIKey" value="<?php isset($geo_data['locatorhq_api_key']) ? print htmlspecialchars($geo_data['locatorhq_api_key']) : print '' ?>">

	     <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Username'); ?></label>
	     <input type="text" name="locatorhqUsername" value="<?php isset($geo_data['locatorhqusername']) ? print htmlspecialchars($geo_data['locatorhqusername']) : print '' ?>">

	     <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','IP, if your site remote IP is different from detected one, please provide correct remote IP address'); ?></label>
	     <input type="text" name="locatorhqIP" value="<?php isset($geo_data['locatorhqip']) ? print htmlspecialchars($geo_data['locatorhqip']) : print erLhcoreClassIPDetect::getServerAddress() ?>">

	     <input type="submit" class="button small round" name="StoreGeoIPConfiguration" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Save'); ?>" />
	</div>

    </div>
  </section>
    
</div>

<input type="submit" class="button small round" name="StoreGeoIPConfiguration" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Save'); ?>" />

</form>

</div>

    </div>
  </section>
  <section>
    <p class="title" data-section-title><a id="map-activator" href="#"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Map location')?></a></p>
    <div class="content" data-section-content>

    	<div>
    		<p><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/onlineusers','Drag a marker where you want to have map centered by default. Zoom is also saved.')?></p>
      		<div id="map_canvas" style="height:600px;width:100%;"></div>
			<script src="https://maps-api-ssl.google.com/maps/api/js?v=3&sensor=false&callback=loadMapLocationChoosing"></script>
		 </div>

    </div>
  </section>
</div>

<script>
var marker;
var map;

function loadMapLocationChoosing(){

	$('#map-activator').click(function(){
		setTimeout(function(){
			google.maps.event.trigger(map, 'resize');
			map.setCenter(marker.getPosition());
		},500);
	});

	var mapOptions = {
		    zoom: <?php echo $geo_location_data['zoom'] ?>,
		    mapTypeId: google.maps.MapTypeId.ROADMAP,
		    disableDefaultUI: true,
	        options: {
	            zoomControl: true,
	            scrollwheel: true,
	            streetViewControl: true
	        },
		    center: new google.maps.LatLng(<?php echo $geo_location_data['lat'] ?>,<?php echo $geo_location_data['lng']?>)
		  };

	map = new google.maps.Map(document.getElementById('map_canvas'),mapOptions);

	var marker = new google.maps.Marker(
	{
	    map:map,
	    draggable:true,
	    animation: google.maps.Animation.DROP,
	    position: new google.maps.LatLng(<?php echo $geo_location_data['lat'] ?>,<?php echo $geo_location_data['lng']?>)
	});

	google.maps.event.addListener(map, 'zoom_changed', function() {
		 var pos = marker.getPosition();
		 $.postJSON('<?php echo erLhcoreClassDesign::baseurl('chat/geoconfiguration')?>/',{zoom:map.getZoom(),store_map:1,csfr_token:confLH.csrf_token,lat:pos.lat().toFixed(4),lng:pos.lng().toFixed(4)}, function(data){

	     });
	});

	google.maps.event.addListener(marker, 'dragend', function(evt) {
	    $.postJSON('<?php echo erLhcoreClassDesign::baseurl('chat/geoconfiguration')?>/',{zoom:map.getZoom(),store_map:1,csfr_token:confLH.csrf_token,lat:evt.latLng.lat().toFixed(4),lng:evt.latLng.lng().toFixed(4)}, function(data){

    	});
	});
};




$('#id_GeoDetectionEnabled').change(function(){
    if ($(this).is(':checked')){
        $('#settings-geo').removeClass('hide');
    } else {
        $('#settings-geo').addClass('hide');
    };
    $(document).foundation('section', 'resize');
});
</script>