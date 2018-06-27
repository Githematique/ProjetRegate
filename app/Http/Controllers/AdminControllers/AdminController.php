<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regate = DB::table('regate')->get()->first();
        return view('accueil')->with('regate', $regate);
    }

    public function gestionAdminView()
    {
      $boats = DB::table('bateau')->orderBy('nom', 'ASC')->get()->all();
      $crews = DB::table('equipier')->orderBy('nom', 'ASC')->get()->all();
      return view('gestionAdmin', compact('boats', 'crews'));
    }

    public function ledOn()
    {
        $setmode17_red = shell_exec("/usr/local/bin/gpio -g mode 17 out");
        $setmode27_blue = shell_exec("/usr/local/bin/gpio -g mode 27 out");
        $setmode22_orange = shell_exec("/usr/local/bin/gpio -g mode 22 out");
        $setmode2_buzzer = shell_exec("/usr/local/bin/gpio -g mode 2 out");

        if (isset($_GET['apercu'])) {

            DB::table('regate')->update(['etape' => 'apercu']);

            $gpio_red_on = shell_exec("/usr/local/bin/gpio -g write 17 1");
            $gpio_blue_on = shell_exec("/usr/local/bin/gpio -g write 27 1");
            $gpio_orange_on = shell_exec("/usr/local/bin/gpio -g write 22 1");
            sleep(10);
            $gpio_red_off = shell_exec("/usr/local/bin/gpio -g write 17 0");
            $gpio_blue_off = shell_exec("/usr/local/bin/gpio -g write 27 0");
            $gpio_orange_off = shell_exec("/usr/local/bin/gpio -g write 22 0");

        } elseif (isset($_GET['depart'])) {

            DB::table('regate')->update(['etape' => 'depart']);

            for ($x = 1; $x <= 10; $x++) {
                $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
                sleep(0.5);
                $gpio_buzzer_off = shell_exec("/usr/local/bin/gpio -g write 2 0");
                sleep(0.5);
            }
            $gpio_red_on = shell_exec("/usr/local/bin/gpio -g write 17 1");
            $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
            sleep(2);
            $gpio_buzzer_off = shell_exec("/usr/local/bin/gpio -g write 2 0");
            sleep(48);
            for ($x = 1; $x <= 10; $x++) {
                $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
                sleep(0.5);
                $gpio_buzzer_off = shell_exec("/usr/local/bin/gpio -g write 2 0");
                sleep(0.5);
            }
            $gpio_orange_on = shell_exec("/usr/local/bin/gpio -g write 22 1");
            $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
            sleep(2);
            $gpio_buzzer_off = shell_exec("/usr/local/bin/gpio -g write 2 0");
            sleep(168);
            for ($x = 1; $x <= 10; $x++) {
                $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
                sleep(0.5);
                $gpio_buzzer_off = shell_exec("/usr/local/bin/gpio -g write 2 0");
                sleep(0.5);
            }
            $gpio_orange_off = shell_exec("/usr/local/bin/gpio -g write 22 0");
            $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
            sleep(2);
            $gpio_buzzer_off = shell_exec("/usr/local/bin/gpio -g write 2 0");
            sleep(48);
            for ($x = 1; $x <= 10; $x++) {
                $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
                sleep(0.5);
                $gpio_buzzer_off = shell_exec("/usr/local/bin/gpio -g write 2 0");
                sleep(0.5);
            }
            $gpio_red_off = shell_exec("/usr/local/bin/gpio -g write 17 0");
            $gpio_blue_off = shell_exec("/usr/local/bin/gpio -g write 27 0");
            $gpio_orange_off = shell_exec("/usr/local/bin/gpio -g write 22 0");
            $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
            sleep(2);
            $gpio_buzzer_off = shell_exec("/usr/local/bin/gpio -g write 2 0");
        }

        if (isset($_GET['retard'])) {

            DB::table('regate')->update(['etape' => 'retard']);
            for ($x = 1; $x <= 10; $x++) {
                $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
                sleep(0.5);
                $gpio_buzzer_off = shell_exec("/usr/local/bin/gpio -g write 2 0");
                sleep(0.5);
            }
            $gpio_red_on = shell_exec("/usr/local/bin/gpio -g write 17 1");
            sleep(1);
            $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
            sleep(1);
            $gpio_red_off = shell_exec("/usr/local/bin/gpio -g write 17 0");
            $gpio_buzzer_off = shell_exec("/usr/local/bin/gpio -g write 2 0");
            $gpio_orange_on = shell_exec("/usr/local/bin/gpio -g write 22 1");
            sleep(1);
            $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
            sleep(1);
            $gpio_orange_off = shell_exec("/usr/local/bin/gpio -g write 22 0");
            $gpio_buzzer_off = shell_exec("/usr/local/bin/gpio -g write 2 0");
            $gpio_blue_on = shell_exec("/usr/local/bin/gpio -g write 27 1");
            sleep(1);
            $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
            sleep(1);
            $gpio_blue_off = shell_exec("/usr/local/bin/gpio -g write 27 0");
            $gpio_buzzer_off = shell_exec("/usr/local/bin/gpio -g write 2 0");
        }

        if (isset($_GET['rappel_i'])) {

            DB::table('regate')->update(['etape' => 'rappel_i']);
            for ($x = 1; $x <= 10; $x++) {
                $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
                sleep(0.5);
                $gpio_buzzer_off = shell_exec("/usr/local/bin/gpio -g write 2 0");
                sleep(0.5);
            }
            $gpio_blue_on = shell_exec("/usr/local/bin/gpio -g write 27 1");
            $gpio_orange_on = shell_exec("/usr/local/bin/gpio -g write 22 1");
            $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
            sleep(2);
            $gpio_buzzer_off = shell_exec("/usr/local/bin/gpio -g write 2 0");
            $gpio_blue_off = shell_exec("/usr/local/bin/gpio -g write 27 0");
            $gpio_orange_off = shell_exec("/usr/local/bin/gpio -g write 22 0");
         }

        if (isset($_GET['rappel_g'])) {

            DB::table('regate')->update(['etape' => 'rappel_g']);
            for ($x = 1; $x <= 10; $x++) {
                $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
                sleep(0.5);
                $gpio_buzzer_off = shell_exec("/usr/local/bin/gpio -g write 2 0");
                sleep(0.5);
            }
            $gpio_blue_on = shell_exec("/usr/local/bin/gpio -g write 27 1");
            $gpio_red_on = shell_exec("/usr/local/bin/gpio -g write 17 1");
            for ($x = 1; $x <= 2; $x++) {
                $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
                sleep(2);
                $gpio_buzzer_off = shell_exec("/usr/local/bin/gpio -g write 2 0");
             }
        }
        if (isset($_GET['modification'])) {

            DB::table('regate')->update(['etape' => 'modification']);
        }

        if (isset($_GET['annulation'])) {

            DB::table('regate')->update(['etape' => 'annulation']);
            for ($x = 1; $x <= 10; $x++) {
                $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
                sleep(0.5);
                $gpio_buzzer_off = shell_exec("/usr/local/bin/gpio -g write 2 0");
                sleep(0.5);
            }
            $gpio_blue_on = shell_exec("/usr/local/bin/gpio -g write 27 1");
            $gpio_orange_on = shell_exec("/usr/local/bin/gpio -g write 22 1");
            $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
            for ($x = 1; $x <= 3; $x++) {
                $gpio_buzze_on = shell_exec("/usr/local/bin/gpio -g write 2 1");
                sleep(2);
                $gpio_buzzer_off = shell_exec("/usr/local/bin/gpio -g write 2 0");
            }
        }

        return redirect('/');
    }
}
