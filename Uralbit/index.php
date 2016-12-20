<?php 

    require_once 'lib/simple_html_dom.php';

    $url = 'http://www.local.com/business/details/san-diego-ca/heavenly-smiles-dentist-138997039/';
    $html = new simple_html_dom();
    $html = file_get_html($url);

    $values = array(
        
        'url' => '', 
        'name' => '', 
        'categories' => [],
        'address' => '',
        'city' => '',
        'postal' => '',
        'phone' => '',
        'maps' => ["lat" => "", "lon" => ""]

    );

    $values['url'] = parse_url($url)['path'];


    foreach ($html->find('#mapArea, strong[itemprop], span[itemprop], span[id]') as $element) {


        if ($element->getAttribute('id') == 'mapArea') {
            
            $ms = explode('[', $element->lastChild()->innertext); 
            $ms =  explode(',', $ms[1]);
            $values['maps']['lat'] = $ms[0];
            $ms = explode(']', $ms[1]);
            $values['maps']['lon'] = $ms[0];

        }

        if ($element->getAttribute('itemprop') == 'name') { $values['name'] = $element->plaintext; }        
        if ($element->getAttribute('itemprop') == 'streetAddress') { $values['address'] = $element->plaintext; }        
        if ($element->getAttribute('itemprop') == 'addressLocality') { $values['city'] = $element->plaintext; }        
        if ($element->getAttribute('itemprop') == 'postalCode') { $values['postal'] = $element->plaintext; }               
        if ($element->getAttribute('itemprop') == 'telephone') { $values['phone'] = $element->plaintext; }               
        if ($element->getAttribute('id') == 'profileCategory') { $values['categories'][] = $element->plaintext; }               

    }   



    print_r($values);

    unset($html);

 ?>