<?php

use Illuminate\Database\Seeder;

class LichSuBanThanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $types = [
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In fermentum et sollicitudin ac orci phasellus egestas. Dignissim convallis aenean et tortor at. Donec enim diam vulputate ut pharetra sit. Orci eu lobortis elementum nibh. Vitae tortor condimentum lacinia quis vel eros.',
            'Praesent elementum facilisis leo vel fringilla est ullamcorper eget. Netus et malesuada fames ac turpis egestas sed. Blandit libero volutpat sed cras ornare arcu dui. Sodales neque sodales ut etiam sit. Rhoncus mattis rhoncus urna neque viverra justo nec. Lectus vestibulum mattis ullamcorper velit.',
            'Nunc scelerisque viverra mauris in aliquam sem fringilla ut morbi. Lorem donec massa sapien faucibus et molestie ac feugiat sed. Magnis dis parturient montes nascetur ridiculus mus mauris vitae. Mauris cursus mattis molestie a iaculis at erat pellentesque. Ullamcorper morbi tincidunt ornare massa eget. Proin fermentum leo vel orci porta non pulvinar neque laoreet. Pretium quam vulputate dignissim suspendisse. Nunc non blandit massa enim nec dui nunc mattis. Ac turpis egestas maecenas pharetra convallis posuere morbi leo.',
            'Cursus risus at ultrices mi tempus imperdiet nulla malesuada. Tempus iaculis urna id volutpat lacus. Vestibulum sed arcu non odio euismod lacinia. Odio facilisis mauris sit amet. In est ante in nibh mauris cursus. Quisque non tellus orci ac. Risus viverra adipiscing at in tellus integer feugiat scelerisque. Quisque sagittis purus sit amet volutpat consequat. Amet est placerat in egestas erat imperdiet sed euismod nisi. Ligula ullamcorper malesuada proin libero. Enim lobortis scelerisque fermentum dui faucibus in.',
            'Felis eget nunc lobortis mattis aliquam. Vehicula ipsum a arcu cursus vitae congue. Cursus in hac habitasse platea dictumst quisque sagittis purus sit. Diam ut venenatis tellus in. Tincidunt arcu non sodales neque sodales ut. Porttitor rhoncus dolor purus non. Arcu cursus vitae congue mauris. Nisl condimentum id venenatis a condimentum vitae sapien pellentesque. Ultrices in iaculis nunc sed augue. Vitae justo eget magna fermentum iaculis eu non diam phasellus. Nulla aliquet enim tortor at auctor urna nunc id.',
            'Morbi tincidunt ornare massa eget egestas purus viverra accumsan in. Dictumst quisque sagittis purus sit amet volutpat consequat mauris. A erat nam at lectus urna duis convallis. Lacus suspendisse faucibus interdum posuere. Sit amet consectetur adipiscing elit duis tristique. Vel quam elementum pulvinar etiam non. Sed turpis tincidunt id aliquet. Volutpat odio facilisis mauris sit amet massa vitae tortor. Id aliquet risus feugiat in ante metus dictum at.',
            'Tellus integer feugiat scelerisque varius morbi enim nunc faucibus. Donec ultrices tincidunt arcu non sodales neque sodales. Nec ultrices dui sapien eget. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Purus viverra accumsan in nisl.',
            'Tincidunt id aliquet risus feugiat. Et ultrices neque ornare aenean. Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque sit. Diam donec adipiscing tristique risus. Netus et malesuada fames ac turpis. Mauris augue neque gravida in. Augue eget arcu dictum varius duis at consectetur lorem. Ultrices vitae auctor eu augue ut lectus arcu.',
            'Lectus quam id leo in vitae turpis massa sed elementum. Lacus viverra vitae congue eu consequat ac felis donec. Orci sagittis eu volutpat odio facilisis mauris sit amet massa. Ut venenatis tellus in metus. Metus vulputate eu scelerisque felis. Faucibus interdum posuere lorem ipsum dolor. Facilisis sed odio morbi quis commodo odio aenean sed adipiscing.',
            'Sit amet consectetur adipiscing elit. Elementum pulvinar etiam non quam lacus suspendisse faucibus. Cras semper auctor neque vitae tempus quam pellentesque nec. Eget duis at tellus at urna condimentum mattis pellentesque id. Quam adipiscing vitae proin sagittis nisl rhoncus. Egestas integer eget aliquet nibh praesent tristique magna sit amet. Ut pharetra sit amet aliquam id.',
            'Posuere lorem ipsum dolor sit amet. Ut venenatis tellus in metus vulputate. Vel eros donec ac odio tempor. Vitae tempus quam pellentesque nec nam aliquam sem et. Non tellus orci ac auctor augue mauris augue neque. Ac feugiat sed lectus vestibulum mattis ullamcorper velit sed. Aliquam id diam maecenas ultricies mi eget mauris pharetra. Congue nisi vitae suscipit tellus mauris a diam maecenas sed. Magna etiam tempor orci eu lobortis.',
            'Enim facilisis gravida neque convallis a cras. Vulputate eu scelerisque felis imperdiet proin fermentum leo vel. Nisi est sit amet facilisis magna etiam tempor orci. Iaculis at erat pellentesque adipiscing commodo elit at imperdiet dui. Odio ut enim blandit volutpat maecenas volutpat blandit aliquam. Ullamcorper velit sed ullamcorper morbi tincidunt ornare massa eget egestas. Ac placerat vestibulum lectus mauris ultrices eros in.',
            'Nisl pretium fusce id velit ut tortor pretium viverra suspendisse. Morbi tristique senectus et netus et malesuada. Pellentesque habitant morbi tristique senectus et netus. Id cursus metus aliquam eleifend. Tellus elementum sagittis vitae et leo duis. Libero justo laoreet sit amet cursus sit amet dictum sit. Viverra adipiscing at in tellus integer feugiat scelerisque. Donec adipiscing tristique risus nec feugiat. Duis at tellus at urna condimentum mattis pellentesque id.',
            'Vulputate eu scelerisque felis imperdiet proin fermentum leo vel orci. Suspendisse in est ante in nibh mauris cursus. Dolor sit amet consectetur adipiscing elit ut aliquam. Semper viverra nam libero justo laoreet. In nisl nisi scelerisque eu ultrices. Morbi tristique senectus et netus et malesuada fames ac. Nunc scelerisque viverra mauris in aliquam sem. Aliquet porttitor lacus luctus accumsan tortor posuere ac. Non odio euismod lacinia at quis risus.',
            'Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam. Non tellus orci ac auctor augue mauris augue neque gravida. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Egestas tellus rutrum tellus pellentesque eu. Semper risus in hendrerit gravida. Amet consectetur adipiscing elit ut aliquam. Blandit volutpat maecenas volutpat blandit aliquam. Libero nunc consequat interdum varius sit amet mattis vulputate enim. Facilisi etiam dignissim diam quis enim. Amet facilisis magna etiam tempor orci eu. Et sollicitudin ac orci phasellus egestas tellus rutrum tellus pellentesque.',
            'Euismod elementum nisi quis eleifend. Libero id faucibus nisl tincidunt eget nullam. Egestas tellus rutrum tellus pellentesque. Congue mauris rhoncus aenean vel elit scelerisque mauris pellentesque. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant. Lacus viverra vitae congue eu consequat ac felis. Morbi tristique senectus et netus et. Sit amet luctus venenatis lectus magna fringilla urna.',
            'Diam sit amet nisl suscipit adipiscing bibendum. Suscipit adipiscing bibendum est ultricies integer quis auctor elit sed. Ipsum faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Non consectetur a erat nam at lectus urna duis convallis. Vitae turpis massa sed elementum tempus. Facilisi morbi tempus iaculis urna id volutpat lacus. Consectetur adipiscing elit duis tristique sollicitudin nibh sit amet commodo.',
            'Risus nec feugiat in fermentum posuere urna nec tincidunt praesent. Turpis egestas pretium aenean pharetra magna ac placerat vestibulum lectus. Pharetra pharetra massa massa ultricies mi quis hendrerit dolor magna. Orci porta non pulvinar neque laoreet suspendisse interdum. Suspendisse ultrices gravida dictum fusce ut placerat orci nulla. Tellus in metus vulputate eu scelerisque felis imperdiet. Magna etiam tempor orci eu lobortis elementum nibh tellus molestie. Urna porttitor rhoncus dolor purus.',
            'Dignissim enim sit amet venenatis. Quis ipsum suspendisse ultrices gravida dictum. Leo a diam sollicitudin tempor id. Dolor sit amet consectetur adipiscing. Nam libero justo laoreet sit amet cursus sit amet.',
            'Ultricies mi eget mauris pharetra. Pulvinar elementum integer enim neque volutpat ac tincidunt. Aliquet risus feugiat in ante metus dictum at. Feugiat nisl pretium fusce id velit. Pretium lectus quam id leo in vitae. Eget velit aliquet sagittis id.'
        ];

        $faker = Faker\Factory::create('vi_VN');
        for ($i = 1; $i < 20; $i++) {
            $ma = 'CB';
            if ($i < 10)
                $ma .= '000';
            else if ($i < 100 )
                $ma .= '00';
            else if ($i < 1000)
                $ma .= '0';
            array_push($list, [
                'lsbt_ma' => $i,
                'nv_ma' => $ma.$i,
                'lsbt_hanhViPhamToi' => $types[$faker->numberBetween(0, count($types)-1)],
                'lsbt_thamGiaToChucChinhTri' => $types[$faker->numberBetween(0, count($types)-1)]
            ]);
        }
        DB::table('lichsubanthan')->insert($list);
    }
}
