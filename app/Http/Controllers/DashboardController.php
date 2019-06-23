<?php

    namespace App\Http\Controllers;

    use App\Discipline;
    use App\Http\Resources\DashboardAbsence;
    use App\User;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class DashboardController extends Controller
    {
        public function getDashboardData(Request $request)
        {

            /** @var User $user */
    //        $user = $request->user()->id;
            $user = User::query()->find(1);
            $now = Carbon::now();
            $userDisciplines = $user->disciplines()->pluck('id');
            $dash = [];
            $indicators = [];
            $absences = [];

            /*
             * Semana no ano
             */
            $week = $now->week;
            $weeksInYear = $now->weeksInYear();
            $indicators[] = [
                'name' => 'Semanas',
                'data' => $week.'/'.$weeksInYear
            ];

            /*
             * Trabalhos Ativos
             */
            $hNumber = DB::table('homeworks')->where([
                ['delivery_at', '>=', $now]
            ])->whereIn('discipline_id', $userDisciplines)->count();
            $indicators[] = [
                'name' => 'Trabalhos Ativos',
                'data' => $hNumber
            ];


            /*
             * Provas na Semana
             */

            $nowToString = $now->toDateTimeString();
            $eowToString = $now->endOfWeek(Carbon::SATURDAY)->toDateTimeString();


            $tNumber = DB::table('tests')->whereBetween(
                'starts_at',
                [
                    $nowToString,
                    $eowToString
                ]
            )->whereIn('discipline_id', $userDisciplines)->count();
            $indicators[] = [
                'name' => 'Provas na semana',
                'data' => $tNumber
            ];


            /*
             * Faltas
             */

            $disciplines = Discipline::query()->whereIn('id', $userDisciplines)->get();

            $absences = DashboardAbsence::collection($disciplines);


            $dash = [
                'indicators' => $indicators,
                'absences' => $absences,
            ];

            return $dash;
        }
    }
