<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Faker;

class AppFixtures extends BaseFixture
{
    public const ADMIN_USER_REFERENCE = 'admin-user';

    public function __construct(
        private UserPasswordHasherInterface $passwordHasher,
    ) {}

    protected function loadData(ObjectManager $manager)
    {
        if (($handle = fopen(__DIR__ .'/data/users.csv', 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ';')) !== FALSE) {
                $username = trim($data[0]);
                $firstName = trim($data[1]);
                $lastName = trim($data[2]);
                $email = trim($data[3]);
                $roles = explode(',', trim($data[4]));
                $password = trim($data[5]);

                if (empty($apiToken)) {
                    $apiToken = $username.'_key';
                }

                if ($username != 'username') { // headers line
                    $user = new User();
                    $user->setUsername($username);
                    $user->setFirstName($firstName);
                    $user->setLastName($lastName);
                    $user->setEmail($email);
                    $user->setRoles($roles);
//                    $user->setApiToken($apiToken);

                    $hashedPassword = $this->passwordHasher->hashPassword($user,$password);
                    $user->setPassword($hashedPassword);
                    $user->setStatut(1); // actif
                    $user->setCreatedAt(new \DateTime('now'));

                    $manager->persist($user);
                }
            }
            fclose($handle);
        }


       $this->createMany(User::class, 20, function(User $user){
           $user->setUsername($this->faker->userName);
           $user->setFirstName($this->faker->firstName);
           $user->setLastName($this->faker->lastName);
           $user->setEmail($this->faker->email);
           $user->setRoles(['ROLE_USER']);
//           $user->setApiToken($this->faker->randomKey());
           $user->setStatut(1);
           $user->setCreatedAt(new \DateTime('now'));

           $hashedPassword = $this->passwordHasher->hashPassword($user,'encode');

           $user->setPassword($hashedPassword);
       });

        $manager->flush();
    }
}
