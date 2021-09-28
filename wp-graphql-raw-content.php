<?php 
/*
Plugin Name: Raw content in graphql
Plugin URI: http://alex.acunaviera.com/
Version: 0.1
Author: Álex Acuña Viera
*/

add_action( 'graphql_register_types', function() {

register_graphql_field( 'NodeWithTitle', 'rawContent', [
  'type' => 'String',
  'description' => 'The raw content  without filters/decoding applied' ,
  'resolve' => function( \WPGraphQL\Model\Post $post ) {
    $post_object = ! empty( $post->databaseId  ) ? get_post( $post->databaseId ) : null;
    return isset( $post_object->post_content ) ? $post_object->post_content : null;
  }
]);

});
