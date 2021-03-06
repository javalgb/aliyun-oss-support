<?php
$options = array_merge(OSS\WP\Config::$originOptions, get_option('oss_options', array()));
$d = 'aliyun-oss';
?>

<div class="wrap" style="margin: 10px;">
    <h1><?php echo __('Aliyun OSS Settings', $d)?></h1>
    <form name="form1" method="post" action="<?php echo wp_nonce_url(OSS\WP\Config::$settingsUrl); ?>">
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row"><label for="access_key">AccessKey</label></th>
                <td><input name="access_key" type="text" id="access_key"
                           value="<?php echo $options['ak'] ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="access_key_secret"></label>AccessKeySecret</th>
                <td><input name="access_key_secret" type="text" id="access_key_secret" value=""
                           placeholder="~<?php echo __("You can't see me", $d) ?> ʅ(‾◡◝)" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="region"><?php echo __('Region', $d).'/'.__('Endpoint', $d) ?></label></th>
                <td>
                    <select name="region" id="region">
                        <option value="oss-cn-hangzhou"><?php echo __('oss-cn-hangzhou', $d)?></option>
                        <option value="oss-cn-shanghai"><?php echo __('oss-cn-shanghai', $d)?></option>
                        <option value="oss-cn-qingdao"><?php echo __('oss-cn-qingdao', $d)?></option>
                        <option value="oss-cn-beijing"><?php echo __('oss-cn-beijing', $d)?></option>
                        <option value="oss-cn-zhangjiakou"><?php echo __('oss-cn-zhangjiakou', $d)?></option>
                        <option value="oss-cn-huhehaote"><?php echo __('oss-cn-huhehaote', $d)?></option>
                        <option value="oss-cn-shenzhen"><?php echo __('oss-cn-shenzhen', $d)?></option>
                        <option value="oss-cn-hongkong"><?php echo __('oss-cn-hongkong', $d)?></option>
                        <option value="oss-us-west-1"><?php echo __('oss-us-west-1', $d)?></option>
                        <option value="oss-us-east-1"><?php echo __('oss-us-east-1', $d)?></option>
                        <option value="oss-ap-southeast-1"><?php echo __('oss-ap-southeast-1', $d)?></option>
                        <option value="oss-ap-southeast-2"><?php echo __('oss-ap-southeast-2', $d)?></option>
                        <option value="oss-ap-southeast-3"><?php echo __('oss-ap-southeast-3', $d)?></option>
                        <option value="oss-ap-southeast-5"><?php echo __('oss-ap-southeast-5', $d)?></option>
                        <option value="oss-ap-northeast-1"><?php echo __('oss-ap-northeast-1', $d)?></option>
                        <option value="oss-ap-south-1"><?php echo __('oss-ap-south-1', $d)?></option>
                        <option value="oss-eu-central-1"><?php echo __('oss-eu-central-1', $d)?></option>
                        <option value="oss-me-east-1"><?php echo __('oss-me-east-1', $d)?></option>
                    </select>

                    <label for="internal" style="margin-left: 48px">
                        <input name="internal" type="checkbox" id="internal" <?php echo $options['internal'] ? 'checked' : '' ?>>
                        <?php echo __('internal', $d)?>
                    </label>
                </td>
            </tr>
            </tbody>
        </table>
        <hr >

        <h2 class="title"><?php echo __('Bucket Settings', $d) ?></h2>
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row"><label for="bucket">Bucket</label></th>
                <td><input name="bucket" type="text" id="bucket" value="<?php echo $options['bucket'] ?>" class="regular-text"></td>
            </tr>
            <tr>
                <th scope="row"><label for="static_host"></label><?php echo __('Bucket Host', $d) ?></th>
                <td>
                    <input name="static_host" type="text" id="static_host" value="<?php echo $options['static_url'] ?>" class="regular-text host">
                    <?php echo is_ssl()?'<p class="description">'.__('Your site is working under https, please make sure the host can use https too.', $d).'</p>':'' ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="store_path"></label><?php echo __('Storage Path', $d) ?></th>
                <td><input name="store_path" type="text" id="store_path" value="<?php echo $options['path'] ?>" class="regular-text">
                    <p class="description"><?php echo __("Keep this empty if you don't need.", $d) ?></p></td>
            </tr>
            </tbody>
        </table>
        <hr>

        <h2 class="title"><?php echo __('Aliyun Image Service Settings', $d) ?></h2>
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row"><?php echo __('Image Service', $d) ?></th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span><?php echo __('Image Service', $d) ?></span></legend>
                        <label for="img_service">
                            <input name="img_service" type="checkbox" id="img_service"
                                <?php echo $options['img_service'] ? 'checked' : '' ?>> <?php echo __('Enable', $d) ?>
                        </label>
                    </fieldset>
                    <p class="description"><?php echo __("Use Aliyun Image Service to provide thumbnails, no need to upload thumbnails to OSS any more.", $d) ?></p>
                </td>
            </tr>
            <tr>
                <th scope="row"><?php echo __('Preset Image Style', $d) ?></th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span><?php echo __('Preset Image Style', $d) ?></span></legend>
                        <label for="img_style">
                            <input name="img_style" type="checkbox" id="img_style" <?php echo $options['img_style'] ? 'checked' : '' ?>
                                <?php echo $options['img_service'] ? '' : 'disabled' ?>> <?php echo __('Enable', $d) ?>
                        </label>
                    </fieldset>
                    <p class="description">
                        <?php echo __("Optional, use preset styles instead of dynamic params to deal image.", $d) ?>
                        <span id="export_style_profile" <?php echo $options['img_style'] ? '' : 'style="display: none"' ?>>
                            => <a href="/wp-admin/options-general.php?page=aliyun-oss&action=download-img-style-profile" target="_blank">
                                <?php echo __("Click to export style profile", $d) ?>
                            </a>
                        </span>
                    </p>
                </td>
            </tr>
            <tr>
                <th scope="row"><?php echo __('Source Image Protection', $d) ?></th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span><?php echo __('Source Image Protection', $d) ?></span></legend>
                        <label for="source_img_protect">
                            <input name="source_img_protect" type="checkbox" id="source_img_protect"
                                <?php echo $options['source_img_protect'] ? 'checked' : '' ?>
                                <?php echo $options['img_style'] ? '' : 'disabled' ?> > <?php echo __('Enable', $d) ?>
                        </label>
                    </fieldset>
                    <p class="description"><?php echo __("If you have enabled source image protection on Aliyun OSS, don't forget to enable this.", $d) ?></p>
                </td>
            </tr>
            <tr>
                <th scope="row"><?php echo __('Custom Separator', $d) ?></th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span><?php echo __('Custom Separator', $d) ?></span></legend>
                        <label for="custom_separator">
                            <input name="custom_separator" type="radio" value=""
                                <?php echo empty($options['custom_separator']) ? 'checked' : '' ?> <?php echo $options['img_style'] ? '' : 'disabled' ?>>
                            <span style="padding-right: 2rem"><?php echo __('Default', $d) ?></span>
                            <input name="custom_separator" type="radio" value="-"
                                <?php echo $options['custom_separator'] == '-' ? 'checked' : '' ?> <?php echo $options['img_style'] ? '' : 'disabled' ?>>
                            <span style="padding-right: 2rem">-</span>
                            <input name="custom_separator" type="radio" value="_"
                                <?php echo $options['custom_separator'] == '_' ? 'checked' : '' ?> <?php echo $options['img_style'] ? '' : 'disabled' ?>>
                            <span style="padding-right: 2rem">_</span>
                            <input name="custom_separator" type="radio" value="/"
                                <?php echo $options['custom_separator'] == '/' ? 'checked' : '' ?> <?php echo $options['img_style'] ? '' : 'disabled' ?>>
                            <span style="padding-right: 2rem">/</span>
                            <input name="custom_separator" type="radio" value="!"
                                <?php echo $options['custom_separator'] == '!' ? 'checked' : '' ?> <?php echo $options['img_style'] ? '' : 'disabled' ?>>
                            <span style="padding-right: 2rem">!</span>
                        </label>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>
                    <p class="description"><?php echo __("There is a guide about Image Service.", $d) ?> =>
                        <a href="https://github.com/IvanChou/aliyun-oss-support/wiki/How-to-use-Image-Service">
                            <?php echo __("How to use Image Service", $d) ?>
                        </a>
                    </p>
                </td>
            </tr>
            </tbody>
        </table>

        <h2 class="title"><?php echo __('Aliyun CDN Authentication', $d) ?></h2>
        <!--URL Authentication settings-->
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row"><?php echo __('Authentication', $d) ?></th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span><?php echo __('Authentication', $d) ?></span></legend>
                        <label for="urlAuth">
                            <input name="urlAuth" type="checkbox" id="urlAuth"
                                <?php echo $options['urlAuth'] ? 'checked' : '' ?>> <?php echo __('Enable', $d) ?>
                        </label>
                    </fieldset>
                    <p class="description"><?php echo __("Enable Url Authentication for Aliyun CDN service, please make sure you've configured CDN URL Authentication Service in Aliyun Console correctly", $d) ?></p>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="authMethod"><?php echo __('url Auth Method', $d)?></label></th>
                <td>
                    <select name="authMethod" id="authMethod">
                        <option value="A"><?php echo __('Method A', $d)?></option>
                        <option value="B"><?php echo __('Method B', $d)?></option>
                        <option value="C"><?php echo __('Method C', $d)?></option>
                    </select>
                    <p class="description"><?php echo __("Select Authentication Medthod, Method A Recommended", $d) ?><br>
                    <a href="https://help.aliyun.com/document_detail/85117.html" target="" ><?php echo __('Help me choose', $d)?></a>
                    </p>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="authPrimaryKey"></label><?php echo __('url Auth PrimaryKey', $d) ?></th>
                <td>
                    <input name="authPrimaryKey" type="text" id="authPrimaryKey" value="" placeholder="<?php echo __("You can't see me", $d) ?> " class="regular-text host">
                    <p class="description"><?php echo __("Set Authentication Key as you like, please don't use AK or SK", $d) ?></p>                    
                </td>
            </tr>
            <tr style="display:none">
                <th scope="row"><label for="authAuxKey"></label><?php echo __('url Auth Aux Key', $d) ?></th>
                <td>
                    <input name="authAuxKey" type="text" id="authAuxKey" value="<?php echo $options['authAuxKey'] ?>" class="regular-text host">              
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="authExpTime"></label><?php echo __('url Auth Exp Time', $d) ?></th>
                <td>
                    <input name="authExpTime" type="number"  min="1" step="1" id="authExpTime" value="<?php echo $options['authExpTime'] ?>" class="regular-text host"> 
                    <p class="description"><?php echo __("Time of url expiration, set hourly", $d) ?></p>
                </td>
            </tr>
            </tbody>
        </table>
        <hr>

        <p>
            <a href="#more-settings" id="load-more-settings"><?php echo __('Advanced Options', $d) ?></a>
        </p>
        <div style="display: none" id="more-settings">
            <h2 class="title"><?php echo __('Advanced Options', $d) ?></h2>
            <table class="form-table">
                <tbody>
                <tr>
                    <th scope="row"><?php echo __('Disable pushing', $d) ?></th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text"><span><?php echo __('Disable pushing', $d) ?></span></legend>
                            <label for="disable_upload">
                                <input name="disable_upload" type="checkbox" id="disable_upload"
                                    <?php echo $options['disable_upload'] ? 'checked' : '' ?>> <?php echo __('Enable', $d) ?>
                                <p class="description"><?php echo __("Plugin will stop push files to OSS automatically, 
                                make sure your Back-to-Origin settings of OSS is working firstly", $d) ?></p>
                            </label>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Clear Files On Server', $d) ?></th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text"><span><?php echo __('Clear Files On Server', $d) ?></span></legend>
                            <label for="no_local_saving">
                                <input name="no_local_saving" type="checkbox" id="no_local_saving"
                                    <?php echo $options['nolocalsaving'] ? 'checked' : '' ?>
                                    <?php echo $options['disable_upload'] ? 'disabled' : '' ?>> <?php echo __('Enable', $d) ?>
                                <p class="description"><?php echo __("Don't keep files on local server.", $d) ?></p>
                            </label>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('keep Settings When Uninstall', $d) ?></th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text"><span><?php echo __('keep Settings When Uninstall', $d) ?></span></legend>
                            <label for="keep_settings">
                                <input name="keep_settings" type="checkbox" id="keep_settings"
                                    <?php echo $options['keep_settings'] ? 'checked' : '' ?>> <?php echo __('Enable', $d) ?>
                            </label>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="exclude"></label><?php echo __('Files To Exclude', $d) ?></th>
                    <td>
                        <input name="exclude" type="text" id="exclude" value="<?php echo $options['exclude'] ?>" class="regular-text">
                        <p class="description"><?php echo __("Regular expression only", $d) ?></p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo __('Commit', $d)?>"></p>
    </form>
</div>

<script>
    jQuery(function ($) {
        var regFormater = function (r) {
            var flags = r.match(/\/([igm]{0,3})$/i);
            var begin = r[0] === '/' ? 0 : -1;
            var end = r.lastIndexOf('/');
            var flag = '';
            if (flags === null) {
                end = r.length;
                r = r + '/';
            } else {
                flag = flags[1];
            }
            return new RegExp(r.substring(begin + 1, end), flag);
        };
        var region = '<?php echo $options['region'] ?>';
        $('#region option[value='+region+']').attr('selected', 'selected');

        $('input.host').blur(function () {
            var val = $(this).val().replace(/(.*\/\/|)(.+?)(\/.*|)$/, '$2');
            $(this).val(val);
        });

        $('#bucket').blur(function () {
            var $staticHost = $('#static_host');
            var bucket = $(this).val();
            var region = $('#region').val();
            if ( bucket !== "" && $staticHost.val() == "" )
                $staticHost.val(bucket + '.' + region + '.aliyuncs.com');
        });

        $('#img_service').change(function () {
            if ($(this).prop('checked')) {
                $('#img_style').attr('disabled', false);
            } else {
                $('#img_style').prop('checked', false).attr('disabled', true);
                $('#source_img_protect').prop('checked', false).attr('disabled', true);
                $('input[name="custom_separator"]').attr('disabled', true).eq(0).prop('checked', true);
            }
        });

        $('#img_style').change(function () {
            if ($(this).prop('checked')) {
                $('#source_img_protect').attr('disabled', false);
                $('input[name="custom_separator"]').attr('disabled', false);
                $('#export_style_profile').show();
            } else {
                $('#source_img_protect').prop('checked', false).attr('disabled', true);
                $('input[name="custom_separator"]').attr('disabled', true).eq(0).prop('checked', true);
                $('#export_style_profile').hide();
            }
        });
        /*CDN Authentication*/
        $('#urlAuth').change(function () {
            if ($(this).prop('checked')) {
                $('#authMethod, #authPrimaryKey, #authAuxKey, #authExpTime').attr('disabled', false);
            } else {
                $('#authMethod, #authPrimaryKey, #authAuxKey, #authExpTime').attr('disabled', true);
            }
        });
        /*Authentication Method*/
        var authMethod = '<?php echo $options['authMethod'] ?>';
        $('#authMethod option[value='+authMethod+']').attr('selected', 'selected');
        console.log( authMethod )
        $('#load-more-settings').click(function () {
            $('#more-settings').show();
            $(this).remove();
        });

        $('#disable_upload').change(function () {
            if ($(this).prop('checked')) {
                $('#no_local_saving').prop('checked', false).attr('disabled', true);
            } else {
                $('#no_local_saving').attr('disabled', false);
            }
        });

        $('#exclude').blur(function () {
            if ($(this).val() !== "") {
                $(this).val(regFormater($(this).val()));
            }
        })
    })
</script>
<style>
/* colors
*阿里云鲜橙色 rgb(255,106,0)
*阿里云蓝色 rgb(0,193,222)
*阿里云灰色 rgb(55,61,65)
*阿里云控制台背景色 rgb(242,242,242)
*阿里云标签背景色 rgb(249,249,249)
*阿里云灰蓝图标色 rgb(63,96,131)
*/
.wrap{
    width: calc(100% - 30px);
    max-width: 800px;
    font-family: -apple-system, BlinkMacSystemFont, "PingFang SC", "Helvetica Neue", "Microsoft YaHei New", STHeiti Light, sans-serif;
    box-shadow: 0 1px 4px 0 rgba(0,0,0,.13);
}
.wrap h1{
    font-size: 2.8125rem;
    font-weight: bold;
    color: #fff;
    background: rgb(255,106,0);
    line-height: 1;
    padding: 1rem;
}
.wrap h2{
    font-size: 2.25rem;
    line-height:1;
}
.wrap form{
    background: rgb(249,249,249);
    padding:0 1rem ;
}
.wrap .form-table th,.wrap .form-table th label{
    font-size: 1.125rem;
    color:rgb(55,61,65);
}
.wrap .form-table p.description {
    padding: 0.5rem;
    background: rgb(242,242,242);
    border-radius: 5px;
}
.wrap .form-table input,.wrap .form-table select {
    border-radius: 5px;
}
.wrap .submit{
    left: -1rem;
    position: relative;
    padding: 2rem 1rem;
    margin-top: 1rem;
    width: 100%;
    background: rgb(242,242,242);
}
@media screen and (max-width: 782px){
    .wrap h1{
    font-size: 2.25rem; 
    }
    .wrap h2{
    font-size: 1.6875rem; 
    }
    .wrap .form-table td select {
        margin-bottom: 0.5rem;
    }
}


</style>