<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li class="menu-title">YOUR COMPANY</li>
            <?php
                $LangID = $this->session->userdata('LangID');
                $s_01   = "SELECT A.menu_code, A.parent_code, A.menu_name_$LangID AS menu_name, A.link, A.fa_icon, A.isHeader 
                            FROM tbl_menu A WHERE A.isActive = 1  AND A.level_menu = 1";
                $r_01   = $this->db->query($s_01);
                if($r_01->num_rows() > 0)
                {
                    foreach($r_01->result_array() as $rw_01):
                        $menu_code      = $rw_01['menu_code'];	
                        $menu_name      = $rw_01['menu_name'];
                        $link           = site_url($rw_01['link']);
                        $fa_icon        = $rw_01['fa_icon'];
                        $isHeader       = $rw_01['isHeader'];

                        ?>
                            <li>
                                <?php
                                    $s_02   = "SELECT A.menu_code, A.parent_code, A.menu_name_$LangID AS menu_name, A.link, A.fa_icon, A.isHeader 
                                                FROM tbl_menu A WHERE A.isActive = 1 AND A.parent_code = '$menu_code'";
                                    $r_02   = $this->db->query($s_02);
                                    if($r_02->num_rows() > 0)
                                    {
                                        ?>
                                        <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                                            <div class="menu-icon">
                                                <?=$fa_icon?>
                                            </div>
                                            <span class="nav-text"><?=$menu_name?>
                                        </a>
                                        <ul aria-expanded="false">
                                        <?php
                                        foreach($r_02->result_array() as $rw_02):
                                            $submenu_code      = $rw_02['menu_code'];	
                                            $submenu_name      = $rw_02['menu_name'];
                                            $sublink           = site_url($rw_02['link']);
                                            $subfa_icon        = $rw_02['fa_icon'];
                                            $subisHeader       = $rw_02['isHeader'];

                                            ?>
                                                <li>
                                                    <?php
                                                        $s_03   = "SELECT A.menu_code, A.parent_code, A.menu_name_$LangID AS menu_name, A.link, A.fa_icon, A.isHeader 
                                                                    FROM tbl_menu A WHERE A.isActive = 1 AND A.parent_code = '$submenu_code'";
                                                        $r_03   = $this->db->query($s_03);
                                                        if($r_03->num_rows() > 0)
                                                        {
                                                            ?> 
                                                            <a class="has-arrow" href="javascript:void(0);" aria-expanded="false"><?=$submenu_name?></a>
                                                            <ul aria-expanded="false">
                                                            <?php
                                                                foreach($r_03->result_array() as $rw_03):
                                                                    $sub1menu_code      = $rw_03['menu_code'];	
                                                                    $sub1menu_name      = $rw_03['menu_name'];
                                                                    $sub1link           = site_url($rw_03['link']);
                                                                    $sub1fa_icon        = $rw_03['fa_icon'];
                                                                    $sub1isHeader       = $rw_03['isHeader'];

                                                                    ?> <li><a href="<?=$sub1link?>"><?=$sub1menu_name?></a></li> <?php
                                                                endforeach;
                                                            ?>
                                                            </ul>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                                <a href="<?=$sublink?>"><?=$submenu_name?></a>
                                                            <?php
                                                        }
                                                    ?>
                                                </li>
                                                
                                            <?php
                                        endforeach;
                                        ?>
                                        </ul>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                            <a href="<?=$link?>">
                                                <div class="menu-icon">
                                                    <?=$fa_icon?>
                                                </div>
                                                <span class="nav-text"><?=$menu_name?>
                                            </a>
                                        <?php
                                    }
                                ?>
                            </li>
                        <?php
                    endforeach;
                }
            ?>
            <li class="menu-title">OUR FEATURES</li>
        </ul>
        <div class="help-desk">
            <a href="javascript:void(0)" class="btn btn-primary">Help Desk</a>
        </div>	
    </div>
</div>