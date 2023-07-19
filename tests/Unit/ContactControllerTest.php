<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Contact;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ContactControllerTest extends TestCase
{
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        config(['database.connections.sqlite_testing' => [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]]);

        $this->app['config']->set('database.default', 'sqlite_testing');
        Artisan::call('migrate');
    }

    public function test_create_contact()
    {
        $faker = Faker::create();

        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('/contacts/store', [
                '_token' => csrf_token(),
                'name' => $faker->name,
                'contact' => $faker->numerify('98#######'),
                'email' => $faker->unique()->safeEmail(),
                'user_id' => $user->id,
            ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('contacts', ['id' => $user->id]);
    }

    public function test_read_contact()
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create(['user_id' => $user->id]);

        $response = $this->get('/contacts/show/' . $contact->id);
        $response->assertStatus(200);
    }

    public function test_update_contact()
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create(['user_id' => $user->id]);
        $faker = Faker::create();

        $response = $this->actingAs($user)->put('/contacts/update/' . $contact->id, [
            'name' => $faker->name,
            'email' => $faker->email,
            'contact' => $faker->numerify('98#######'),
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('contacts', ['id' => $contact->id, 'user_id' => $user->id]);
    }

    public function test_delete_contact()
    {

        $user = User::factory()->create();
        $contact = Contact::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->delete('/contacts/destroy/' . $contact->id);

        $response->assertStatus(302);
        $this->assertSoftDeleted('contacts', ['id'=>  $contact->id]) ;
    }

}
