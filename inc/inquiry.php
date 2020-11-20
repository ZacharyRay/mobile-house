<?php

function create_inquiry($data) {
  $name = sanitize_text_field($data['full_name']);
  $mail = sanitize_text_field($data['mail']);
  $phone = sanitize_text_field($data['phone']);
  $company = sanitize_text_field($data['company']);
  $message = sanitize_text_field($data['message']);
  $product = get_post(sanitize_text_field($data['product']));

  $inquiry = wp_insert_post([
    'post_type' => 'inquiry',
    'post_title' => 'Ny forespørgsel fra ' . $name,
    'post_status' => 'publish'
  ]);

  $details = 'Forespørgslen er givet på produktet ' . $product->post_title . '. Produktet kan ses her: ' . get_permalink($product->ID);

  update_field('details', $details, $inquiry);
  
  update_field('name', $name, $inquiry);
  update_field('phone', $phone, $inquiry);
  update_field('mail', $mail, $inquiry);
  update_field('company', $company, $inquiry);
  update_field('message', $message, $inquiry);

  $to = get_option('admin_email');
  $subject = 'Ny forespørgsel fra ' . $name;
  $headers[] = 'From: Mobilhouse <' . get_option('admin_email') . '>';
  $headers[] = 'Content-type: text/html; charset=utf-8';
  $body = '<html><head>';
  $body .= '</head><body>';
  $body .= '<h4>Ny forespørgsel</h4>';
  $body .= '<p>Produkt: ' . $product->post_title . ' (' . get_permalink($product->ID) . ')</p><br />';
  $body .= '<p>Navn: ' . $name . '</p>';
  $body .= '<p>Telefonnummer: ' . $phone . '</p>';
  $body .= '<p>Firma: ' . $company . '</p>';
  $body .= '<p>Mailadresse: ' . $mail . '</p>';
  $body .= '<p>Message: ' . $message . '</p>';
  $body .= '</></html>';
  
  $mail_sent = wp_mail( $to, $subject, $body, $headers );

  if($inquiry && $mail_sent) {
    component('inquiry-modal', [
      'complete' => true
    ]);
  }
}