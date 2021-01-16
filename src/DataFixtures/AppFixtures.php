<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Entity\Stage;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Creation d'un générateur de données Faker
        $faker = \Faker\Factory::create('fr_FR');

        $dutInfo = new Formation();
        $dutInfo->setIntitule("DUT Informatique");
        $dutInfo->setNiveau("Bac +2");
        $dutInfo->setVille($faker->city);

        $BTSsn = new Formation();
        $BTSsn->setIntitule("BTS Système numériques");
        $BTSsn->setNiveau("Bac +2");
        $BTSsn->setVille($faker->city);

        $tableauFormations = array($dutInfo, $BTSsn);

        foreach ($tableauFormations as $formation){
            $manager->persist($formation);
        }

        $nbEntreprises = 15;

        for($i=0; $i < $nbEntreprises; $i++){
            $entreprise = new Entreprise();
            $entreprise->setNom($faker->company);
            $entreprise->setAdresse($faker->address);
            $manager->persist($entreprise);

            $nbStages = $faker->numberBetween($min=0, $max=2);

            for($ii=0; $ii < $nbStages; $ii++){
                $stage = new Stage();
                $stage->setIntitule($faker->jobTitle);
                $stage->setDescription($faker->realText($maxNbChars = 50, $indexSize = 2));
                $stage->setDuree($faker->word);
                $stage->setDateDebut($faker->regexify('[0-9]{2}/[0-9]{2}/[0-9]{4}'));
                $stage->setCompetencesRequises($faker->text($maxNbChars = 200));
                $stage->setExperienceRequise($faker->text($maxNbChars = 10));
                $numFormation = $faker->numberBetween($min=0, $max=1);
                $tableauFormations[$numFormation] -> addStage($stage);
                $entreprise->addStage($stage);
                $manager->persist($entreprise);
                $manager->persist($tableauFormations[$numFormation]);
                $manager->persist($stage);

            }
        }
        $manager->flush();
    }
}
