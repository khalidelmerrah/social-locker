<?php
/**
 * A number of global functions with the prefix 'factory_fr106_', 
 * that are used to manage Factory instances.
 */

/**
 * A Factory gateway to create an instance of the plugin. 
 * It should be invoked first in plugin file.
 */
function factory_fr106_create_plugin( $pluginPath, $data ) {
    $plugin = new FactoryFR106Plugin($pluginPath, $data );
    return $plugin;
}

/**
 * Returns nonce based on a current wordpress blog options.
 */
function factory_fr106_get_nonce() {
    $values = array('name', 'description', 'admin_email', 'url', 'language', 'version');
    $line = '';
    
    foreach($values as $value) $line .= get_bloginfo($value);
    return md5( $line );
}

/**
 * Prints nonce based on a current wordpress blog options.
 */
function factory_fr106_nonce() {
    echo factory_fr106_get_nonce();
}

// ------------------------------
// Json functions
// ------------------------------

function factory_fr106_json_error($error) {
    echo json_encode(array('error' => $error));
    exit;
}

// ------------------------------
// String functions
// ------------------------------

function factory_fr106_starts_with($haystack, $needle) {
    return !strncmp($haystack, $needle, strlen($needle));
}

function factory_fr106_ends_with($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) return true;
    return (substr($haystack, -$length) === $needle);
}

// ------------------------------
// File functions
// ------------------------------

function factory_fr106_pathinfo( $path ) {
    $data = pathinfo($path);
    $data['filename'] = factory_fr106_filename_without_ext($data['basename']);
    return $data;
}

function factory_fr106_filename_without_ext($filename){
    $pos = strripos($filename, '.');
    if($pos === false){
        return $filename;
    }else{
        return substr($filename, 0, $pos);
    }
}