<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en-US"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en-US"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en-US"> 
<!--<![endif]-->
<!--STAR HEAD-->
<?php $this->load->view("head");?>
<!--END HEAD-->
<body class="archive post-type-archive post-type-archive-portfolio wpb-js-composer js-comp-ver-5.3 vc_responsive">
    <div class="mobile-menu-wrapper mobile-menu-fullscreen">
        <!--GET NAV MOBILE-->
    	<?php $this->load->view("nav_mobile");?>
        <!--END GET NAV MOBILE-->
    </div>
    <div class="mobile-menu-overlay"></div>
	<div class="wrapper" id="main-wrapper">
		<style>header.site-header {padding-top: 35px;}</style>
                <style>header.site-header {padding-bottom: 35px;}</style>
                <!--START HEADER 2-->
                <?php $this->load->view("header_2");?>
                <!--END HEADER 2-->
            <script>
                    var headerOptions = headerOptions || {};
                    Object.assign( headerOptions, {"stickyHeader":false} );
            </script>
            
    <div id="tours-2-container" class="container portfolio-container-and-title portfolio-loop-layout-type-1">
	<div class="page-container">
            <div class="row">
                <div class="vc-parent-row row-stretch_row vc_custom_1497004378733">
        <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid tours vc_row-has-fill">
          <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner ">
              <div class="wpb_wrapper">
                <div id="tours-1-container" class="lab-portfolio-items portfolio-container-and-title  portfolio-loop-layout-type-1">
                  <div class="row">
                    <div id="tours-1" class="portfolio-holder portfolio-type-1 sort-by-js">
                        <!--START PACKAGE BASIC-->
                        <?php 
                        foreach ($obj_franchise as $value) { ?>
                            <div class="portfolio-item portfolio-item-type-3 has-padding w4 post-435 portfolio type-portfolio status-publish has-post-thumbnail hentry portfolio_category-beaches" data-portfolio-item-id="435" data-terms="beaches">
                                <div class="item-box wow fadeIn">
                                  <div class="photo">
                                     <?php $url = convert_slug($value->name);?>
                                    <a href="<?php echo site_url()."plan/$url";?>" class="item-link">
                                      <style>.img-456{background-color: #484848;}</style> 
                                      <span class="image-placeholder img-456" style="padding-bottom:83.20610687%">
                                          <img width="655" height="545" class="lazyload" alt="<?php echo string_to_mayusculas($value->name);?>" src="<?php echo site_url()."static/backoffice/images/$value->img";?>" data-src="<?php echo site_url()."static/backoffice/images/$value->img";?>" data-sizes="(max-width: 655px) 100vw, 655px">	
                                      </span>

                                      <span class="on-hover opacity-yes">
                                        <span class="custom-hover-icon">
                                            <img width="256" height="256" src="<?php echo site_url().'static/page_front/images/plan/loader.gif';?>" class="attachment-original size-original" alt="gif" style="width:78px" />						
                                        </span>
                                      </span>
                                    </a>
                                  </div>
                                  <div class="info">
                                        <h3>
                                            <a href="<?php echo site_url().'plan/basic'?>" class="item-link"><?php echo string_to_mayusculas($value->name);?></a>
                                        </h3>
                                      <p class="terms"><a href="<?php echo site_url().'plan/basic'?>" data-term="beaches"><?php echo format_number_dolar($value->price)?></a></p>		
                                    </div>
                                </div>
                          </div>
                        <?php } ?>
                    </div>
                    <script>
                      var portfolioContainers = portfolioContainers || [];
                      	portfolioContainers.push( {"instanceId":"tours-1","instanceAlias":"tours-1","baseQuery":{"post_type":["portfolio"],"post_status":"publish","posts_per_page":-1,"orderby":"date","tax_query":{"relation":"AND","0":{"field":"term_id","taxonomy":"portfolio_category","terms":[12],"operator":"NOT IN"}},"page":"","paged":0,"meta_query":[{"key":"_thumbnail_id","compare":"EXISTS"}]},"vcAttributes":{"portfolio_query":"size:-1|order_by:date|post_type:,portfolio|tax_query:-12","title":"","description":"","category_filter":"yes","portfolio_type":"type-1","columns":"inherit","reveal_effect":"fade-one","portfolio_spacing":"inherit","dynamic_image_height":"no","portfolio_full_width_title_container":"yes","portfolio_full_width":"inherit","pagination_type":"static","more_link":"","endless_auto_reveal":"","endless_show_more_button_text":"Show More","endless_no_more_items_button_text":"No more portfolio items to show","endless_per_page":"","el_class":"","css":""},"postId":0,"count":14,"countByTerms":{"beaches":5,"city-break":4,"history":3,"nature":3},"lightboxData":null,"filterPushState":false} );
                    </script>

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="vc_row-full-width vc_clearfix"></div>
      </div>
    </div>
            </div>
	</div>
    </div>
<!--START FOOTER-->
    <?php $this->load->view("footer");?>
<!--END FOOTER-->
<style>
.wrapper {padding-top: 0px !important}
</style>			
<script>
    function revslider_showDoubleJqueryError(sliderID) {
            var errorMessage = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
            errorMessage += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
            errorMessage += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
            errorMessage += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
            errorMessage = "<span style='font-size:16px;color:#BC0C06;'>" + errorMessage + "</span>";
                    jQuery(sliderID).show().html(errorMessage);
    }
</script>
<script src='<?php echo site_url().'static/page_front/js/bos_main.js?ver=1.2';?>'></script>
<script>
/* <![CDATA[ */
var objectL10n = {"destinationErrorMsg":"Sorry, we need at least part of the name to start searching.","tooManyDays":"Your check-out date is more than 30 nights after your check-in date. Bookings can only be made for a maximum period of 30 nights. Please enter alternative dates and try again.","dateInThePast":"Your check-in date is in the past. Please check your dates and try again.","cObeforeCI":"Please check your dates, the check-out date appears to be earlier than the check-in date.","calendar_nextMonth":"Next month","calendar_prevMonth":"Prev month","calendar_closeCalendar":"Close calendar","january":"January","february":"February","march":"March","april":"April","may":"May","june":"June","july":"July","august":"August","september":"September","october":"October","november":"November","december":"December","mo":"Mo","tu":"Tu","we":"We","th":"Th","fr":"Fr","sa":"Sa","su":"Su","updating":"Updating...","close":"Close","placeholder":"e.g. city, region, district or specific hotel","aid":"382821","dest_type":"select","calendar":"0","month_format":"short","flexible_dates":"0","logodim":"blue_150x25","logopos":"left","buttonpos":"right","bgcolor":"#FEBA02","textcolor":"#003580","submit_bgcolor":"#0896FF","submit_bordercolor":"#0896FF","submit_textcolor":"#FFFFFF","aid_starts_with_four":"affiliate ID is different from partner ID: should start with a 1, 3, 8 or 9. Please change it.","images_js_path":"https:\/\/demo.kaliumtheme.com\/travel\/wp-content\/plugins\/bookingcom-official-searchbox\/images"};
/* ]]> */
</script>
<script src='<?php echo site_url().'static/page_front/js/bos_date.js?ver=1.0';?>'></script>
<script src='<?php echo site_url().'static/page_front/js/wp-embed.min.js?ver=4.8.2';?>'></script>
<script src='<?php echo site_url().'static/page_front/js/js_composer_front.min.js?ver=5.3';?>'></script>
<script src='<?php echo site_url().'static/page_front/js/main.min.js?ver=2.1.3';?>'></script>
<!-- Google Code for Click Conversion Page -->
<script>
/* <![CDATA[ */
var google_conversion_id = 991533214;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script src="//www.googleadservices.com/pagead/conversion.js"></script>
<style>iframe[name="google_conversion_frame"] { position: absolute; left: -99999px; }</style>
</body>
</html>
