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
        $data3 = [1,1,0,1,1];

        for ($i=0; $i < 4; $i++) { 
            $name = $i+1;
            DB::table('themes')->insert(['name'=>'theme'.$name,'image'=>'templates/theme'.$name.'.png']);
            DB::table('theme_details')->insert(['theme_id'=>$i+1,
                                                'color'=>$data[$i],
                                                'background_image_color'=>$data2[$i],
                                                'background_color'=>1,
                                                'large_text'=>$data3[$i],
                                                'shape_image'=>$data3[$i],
                                                'head_orientation'=>$data3[$i],
                                                'shape'=>$data3[$i],
                                                'buttons_shape'=>$data3[$i]+2,
                                                'divs_shape'=>$data3[$i],
                                            ]);
        }



    $themesItemes = [
                        ['theme_id'=>1, 'item_id' =>1,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>1, 'item_id' =>2,'name'=>'example','order'=>4,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>1, 'item_id' =>3,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>1, 'item_id' =>4,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>1, 'item_id' =>5,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>1, 'item_id' =>6,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>1, 'item_id' =>7,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>1, 'item_id' =>8,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>1, 'item_id' =>9,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>1, 'item_id' =>10,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        
                        ['theme_id'=>2, 'item_id' =>1,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>2, 'item_id' =>2,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>2, 'item_id' =>3,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>2, 'item_id' =>4,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>2, 'item_id' =>5,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>2, 'item_id' =>6,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>2, 'item_id' =>7,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>2, 'item_id' =>8,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>2, 'item_id' =>9,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>2, 'item_id' =>10,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],

                        ['theme_id'=>3, 'item_id' =>1,'name'=>'example','order'=>5,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>3, 'item_id' =>2,'name'=>'example','order'=>6,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>3, 'item_id' =>8,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>3, 'item_id' =>10,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        
                        ['theme_id'=>4, 'item_id' =>1,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>2,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>3,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>4,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>5,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>6,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>7,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>8,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>9,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
                        ['theme_id'=>4, 'item_id' =>10,'name'=>'example','order'=>1,'description'=>1,'item_data'=>1,'size'=>12],
            ];
            foreach ($themesItemes as $t) {

                    DB::table('theme_items')->insert($t);
                
            }
                  
            
        
      
        
       
    }
}
