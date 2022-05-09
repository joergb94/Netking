<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['#ff0000','#ff8000','#ffff00','#40ff00','#00bfff'];
        $data2 = ['#808080','#ffffff','#000033','#0d0033','#333300'];
        $data3 = [1,0,0,1,1];

        for ($i=0; $i < 4; $i++) { 
            $name = $i+1;
            DB::table('themes')->insert(['name'=>'theme'.$name,'image'=>'templates/theme'.$name.'.png']);
            DB::table('theme_details')->insert(['theme_id'=>$i+1,
                                                'color'=>$data[$i],
                                                'background_image_color'=>$data2[$i],
                                                'background_color'=>1,
                                                'large_text'=>$data3[$i],
                                                'shape_image'=>0,
                                                'head_orientation'=>0,
                                                'shape'=>$data3[$i],
                                                'buttons_shape'=>2,
                                                'divs_shape'=>1,
                                            ]);
        }



    $themesItemes = [
                        ['theme_id'=>1, 'item_id' =>1,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>1, 'item_id' =>NULL,'name'=>'example','order'=>2,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>1, 'item_id' =>NULL,'name'=>'example','order'=>3,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>1, 'item_id' =>2,'name'=>'example','order'=>4,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>1, 'item_id' =>NULL,'name'=>'example','order'=>5,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>1, 'item_id' =>NULL,'name'=>'example','order'=>6,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>1, 'item_id' =>11,'name'=>'example','order'=>6,'description'=>1,'item_data'=>1,'size'=>12],
                        
                        ['theme_id'=>2, 'item_id' =>1,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>2, 'item_id' =>2,'name'=>'example','order'=>2,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>2, 'item_id' =>NULL,'name'=>'example','order'=>3,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>2, 'item_id' =>NULL,'name'=>'example','order'=>4,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>2, 'item_id' =>NULL,'name'=>'example','order'=>5,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>2, 'item_id' =>NULL,'name'=>'example','order'=>6,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>2, 'item_id' =>NULL,'name'=>'example','order'=>7,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>2, 'item_id' =>NULL,'name'=>'example','order'=>8,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>2, 'item_id' =>11,'name'=>'example','order'=>8,'description'=>1,'item_data'=>1,'size'=>12],
                      

                        ['theme_id'=>3, 'item_id' =>1,'name'=>'example','order'=>5,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>3, 'item_id' =>2,'name'=>'example','order'=>6,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>3, 'item_id' =>NULL,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>3, 'item_id' =>NULL,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>3, 'item_id' =>11,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        
                        ['theme_id'=>4, 'item_id' =>1,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>2,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>NULL,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>NULL,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>NULL,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>NULL,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>NULL,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>NULL,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>NULL,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>NULL,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>11,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
            ];
            foreach ($themesItemes as $t) {

                    DB::table('theme_items')->insert($t);
                
            }
                  
            
        
      
        
       
    }
}
