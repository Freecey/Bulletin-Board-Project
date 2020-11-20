<ol class="breadcrumb">
    <?php 

    $breadcrumb;
    $separator = ' / ';
    $domain = 'jenesaispas'
    function build($array) {
        $crumbs = array_merge(array('home' => ''), $array);
        $count = 0;

        foreach($crumbs as $title => $link) {
            $this->breadcrumb .= '
            <li>
                <a href"'.$this->domain. '/' .link.'" itemprop="url">
                    <span itemprop="title">'.$title.'</span>
                </a> 
            </li>'

        $count++;

        if ($count !== count($crumbs)) {
            $this->breadcrumb .= $this->separator;
        }
        }
    }
    return $this->breadcrumb;

    ?>
  <li class="guidemap"><a href= <?php echo $homePath . 'guides/map.php"' ?> >map</a></li>
</ol>