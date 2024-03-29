<?php

/**
 * @file
 * contactinfo.tpl.php
 * Default theme implementation to display the hcard in a block.
 *
 * Available variables:
 *
 * - $contactinfo: variable_get('contactinfo', array()).
 *
 * - $type: Either 'personal' or 'business'.
 *
 * - $given_name: The given-name value.
 * - $family_name: The family-name value.
 * - $org: The name of the business or organization.
 *
 * - $tagline: The tagline.
 *
 * - $street_address: The street-address value.
 * - $locality: The locality value. In USA, this is the city.
 * - $region: The region value. In the USA, this is the state.
 * - $postal_code: The postal-code value.
 * - $country: The country-name value.
 *
 * - $longitude: The longitude value in decimal degrees format.
 * - $latitude: The latitude value in decimal degrees format.
 * - $longitude_formatted: The longitude value in decimal degrees and decimal
 *   minutes format.
 * - $latitude_formatted: The latitude value in decimal degrees and decimal
 *   minutes format.
 *
 * - $phones: An array of phone numbers.
 * - $faxes: An array of fax numbers.
 *
 * - $email_url: The href for the mailto link.
 * - $email: The email address value.
 */
global $language;

?>
<div id="<?php print $id; ?>" class="vcard">

<?php if ($type == 'personal'): ?>
  <div class="fn n">
    <?php if ($given_name): ?>
      <span class="given-name"><?php print $given_name; ?></span>
    <?php endif; ?>
    <?php if ($family_name): ?>
      <span class="family-name"><?php print $family_name; ?></span>
    <?php endif; ?>

    <?php if ($org): ?>
      <h2 class="org"><?php print $org; ?></h2>
    <?php endif; ?>
  </div>
<?php else: ?>
  <?php if ($org): ?>
	  
	  <?php if($language->language == 'en'):?>
   	   	<div class="fn org"><?php print $org; ?></div>
 	 <?php endif; ?>
	  
	  <?php if($language->language == 'zh-hans'):?>
		  <?php if ($tagline): ?>
		    <div class="tagline"><?php print $tagline; ?></div>
		  <?php endif; ?>
 	 <?php endif; ?>
	 
  <?php endif; ?>
<?php endif; ?>



<!-- English Address -->
<?php if($language->language == 'en'):?>
	<?php if ($street_address || $locality || $region || $postal_code || $country): ?>
	  <div class="adr">
	    <?php if ($street_address): ?>
	      <div class="street-address"><?php print $street_address; ?></div>
	    <?php endif; ?>
	    <?php if ($street_address_2): ?>
	      <div class="street-address"><?php print $street_address_2; ?></div>
	    <?php endif; ?>
	    <?php if ($street_address_3): ?>
	      <div class="street-address"><?php print $street_address_3; ?></div>
	    <?php endif; ?>
	    <?php if ($district): ?>
	      <div class="street-address"><?php print $district; ?></div>
	    <?php endif; ?>
	    <?php if ($locality): ?>
	      <div class="locality"><?php print $locality; ?></div><?php print $region ? '' : ''; ?>
	    <?php endif; ?>
	    <?php if ($region): ?>
	      <div class="region"><?php print $region; ?></div>
	    <?php endif; ?>
	    <?php if ($postal_code): ?>
	      <span class="postal-code"><?php print $postal_code; ?></span>
	    <?php endif; ?>
	    <?php if ($country): ?>
	      <span class="country-name"><?php print $country; ?></span>
	    <?php endif; ?>
	  </div>
	<?php endif; ?>
<?php endif; ?>

<!-- Chinese Address -->
<?php if($language->language == 'zh-hans'):?>
	<?php if ($extended_address): ?>
	  <div class="adr">
	      <div class="street-address"><?php print $extended_address; ?></div>
	  </div>
	<?php endif; ?>
<?php endif; ?>

<?php if ($longitude || $latitude): ?>
  <div class="geo">
    <abbr class="longitude" title="<?php print $longitude; ?>"><?php print $longitude_formatted; ?></abbr>
    <abbr class="latitude" title="<?php print $latitude; ?>"><?php print $latitude_formatted; ?></abbr>
  </div>
<?php endif; ?>

<?php if ($phones || $faxes): ?>
  <div class="phone">
    <?php foreach ($phones as $phone): ?>
      <?php if ($phone): ?>
        <div class="">
			<i class="fa fa-phone fa-lg"></i>&nbsp;&nbsp;<?php print $phone; ?>
		</div>
      <?php endif; ?>
    <?php endforeach; ?>
	<br/>
    <?php foreach ($faxes as $fax): ?>
      <?php if ($fax): ?>
        <div class="">
			<i class="fa fa-print fa-lg"></i>&nbsp;&nbsp;<?php print $fax; ?>
		</div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
	<br/>

  <?php if ($email): ?>
    <i class="fa fa-envelope fa-lg"></i>&nbsp;&nbsp;<a href="<?php print $email_url; ?>" class=""><?php print $email; ?></a>
  <?php endif; ?>

</div>
