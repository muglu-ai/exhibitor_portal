<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Schema;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'event_name',
        'event_website',
        'event_year',
        'no_of_exhibitors',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function createTables($eventName, $eventYear)
    {
        // if event name and year characters are more than 15, shorten it
        if (strlen($eventName) > 15) {

            $eventName = substr(str_replace(' ', '_', $eventName), 0, 10);
        }
        $tableName =  $eventName . '_' . $eventYear .'_exhibitor';

        if (!Schema::hasTable($tableName)) {
            Schema::create($tableName, function (Blueprint $table) {
                $table->id();
                $table->string('exhibitor_id', 25);
                $table->string('exhibitor_name', 255)->nullable();
                $table->string('cp_title', 255)->nullable();
                $table->string('cp_fname', 255)->nullable();
                $table->string('cp_mname', 255)->nullable();
                $table->string('cp_lname', 255)->nullable();
                $table->string('cp_desig', 255)->nullable();
                $table->string('cntry_code_phone', 5)->nullable();
                $table->string('cntry_code_mobile', 5)->nullable();
                $table->string('mob', 20)->nullable();
                $table->string('email', 255)->nullable();
                $table->string('website', 255)->nullable();
                $table->string('address_line_1', 255)->nullable();
                $table->string('address_line_2', 255)->nullable();
                $table->string('city', 255)->nullable();
                $table->string('state', 255)->nullable();
                $table->string('country', 255)->nullable();
                $table->string('zip', 25)->nullable();
                $table->text('profile')->nullable();
                $table->string('reg_date', 50)->nullable();
                $table->string('reg_time', 50)->nullable();
                $table->string('reg_id', 50)->nullable();
                $table->string('booth_no', 50)->nullable();
                $table->string('booth_area', 50)->nullable();
                $table->string('fascia_name', 50)->nullable();
                $table->string('hall_no', 50)->nullable();
                $table->string('total_exhibitors', 50)->nullable();
                $table->string('category', 100)->nullable();
                $table->string('booth_space', 50)->nullable();
                $table->text('exhi_profile')->nullable();
                $table->text('keywords')->nullable();
                $table->text('logo')->nullable();
                $table->string('assoc_nm', 50)->nullable();
                $table->boolean('reg_complete')->default(false);
                $table->timestamps();
            });
        }
        $tableName2 =  $eventName . '_' . $eventYear .'_users';
        if (!Schema::hasTable($tableName2)) {
            Schema::create($tableName2, function (Blueprint $table) {
                $table->id();
                $table->string('event_name', 255);
                $table->string('name', 255);
                $table->string('username', 255);
                $table->string('password', 255);
                $table->string('role', 255);
                $table->integer('no_of_exhibitors')->unsigned();
                $table->timestamps();
            });
        }
    }
}
