<?php

namespace Database\Seeders;

use App\Models\PortfolioProject;
use Illuminate\Database\Seeder;

class PortfolioProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Championnat National de Scrabble',
                'slug' => 'championnat-national-de-scrabble',
                'client' => 'FECA-Scrabble',
                'service' => 'Activations & Événementiel',
                'image' => 'assets/success1.jpg',
                'challenge' => 'Dynamiser l\'image d\'une discipline intellectuelle prestigieuse et orchestrer un événement d\'envergure nationale attirant médias, sponsors et grand public.',
                'description' => 'Organisation intégrale, scénographie contemporaine, régie de diffusion live et logistique globale du plus grand tournoi de Scrabble en Afrique subsaharienne. L\'agence a assuré la direction artistique et l\'expérience immersive des compétiteurs et spectateurs.',
                'metrics' => [
                    ['value' => '350+', 'label' => 'Compétiteurs réunis'],
                    ['value' => '75 000+', 'label' => 'Vues sur les directs'],
                    ['value' => '12', 'label' => 'Médias partenaires'],
                ],
                'deliverables' => 'Scénographie de scène, Diffusion streaming HD, Relations presse, Branding signalétique',
                'order' => 1,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Bavaria Pool Vibes 2026',
                'slug' => 'bavaria-pool-vibes-2026',
                'client' => 'Bavaria Cameroun',
                'service' => 'Création de Contenus',
                'image' => 'assets/success2.jpg',
                'challenge' => 'Positionner la marque au cœur de l\'art de vivre urbain branché et créer une vague d\'engouement viral spontané auprès des 20-35 ans.',
                'description' => 'Couverture photo & vidéo immersive, création de capsules vidéo courtes (Reels / TikTok), direction créative de l\'animation festive et relais d\'amplification en temps réel sur les plateformes digitales.',
                'metrics' => [
                    ['value' => '+240%', 'label' => 'Taux d\'engagement'],
                    ['value' => '180 000+', 'label' => 'Impressions TikTok'],
                    ['value' => '1 200+', 'label' => 'Participants'],
                ],
                'deliverables' => 'Aftermovie cinéma, 15 capsules Reels/TikTok, Shooting ambiance, Live stories',
                'order' => 2,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Super Masters Scrabble',
                'slug' => 'super-masters-scrabble',
                'client' => 'Fédération Internationale',
                'service' => 'Stratégie & Conseil',
                'image' => 'assets/success3.jpg',
                'challenge' => 'Rehausser la valeur perçue de la compétition élite afin d\'attirer des partenaires institutionnels et des marques premium privées.',
                'description' => 'Repositionnement stratégique, refonte complète de la charte de présentation, élaboration du dossier de sponsoring et stratégie de relations publiques ciblées auprès des décideurs économiques.',
                'metrics' => [
                    ['value' => '3', 'label' => 'Nouveaux sponsors premium'],
                    ['value' => '+150%', 'label' => 'Retombées presse'],
                    ['value' => '100%', 'label' => 'Objectif financier atteint'],
                ],
                'deliverables' => 'Livre de marque, Dossier partenaires, Plan média 360°, Stratégie de relations publiques',
                'order' => 3,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Tournoi Féminin Scrabble',
                'slug' => 'tournoi-feminin-scrabble',
                'client' => 'FECA-Scrabble',
                'service' => 'Marketing d\'Influence',
                'image' => 'assets/success4.jpg',
                'challenge' => 'Encourager la représentativité féminine dans les compétitions de haut niveau et créer un impact sociétal inspirant à travers des ambassadrices fortes.',
                'description' => 'Campagne d\'influence ciblée mobilisant des figures féminines inspirantes, création de contenu narratif axé sur le dépassement de soi et médiatisation cross-canal de l\'événement.',
                'metrics' => [
                    ['value' => '8', 'label' => 'Créatrices engagées'],
                    ['value' => '95 000+', 'label' => 'Portée cumulée'],
                    ['value' => '+65%', 'label' => 'Inscriptions féminines'],
                ],
                'deliverables' => 'Casting créatrices de contenu, Ligne éditoriale, Interviews vidéos portraits, Kits RP',
                'order' => 4,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Plateforme Digitale B2B',
                'slug' => 'plateforme-digitale-b2b',
                'client' => 'Groupe AllSmart Digital',
                'service' => 'Site Internet',
                'image' => 'assets/services/site1.jpg',
                'challenge' => 'Concevoir une vitrine digitale moderne capable de convertir les visiteurs professionnels en prospects qualifiés avec un parcours utilisateur sans friction.',
                'description' => 'Conception UX/UI responsive sur-mesure, développement full-stack optimisé, module de prise de rendez-vous en ligne instantané et optimisation SEO pour un positionnement de référence.',
                'metrics' => [
                    ['value' => '< 1.2s', 'label' => 'Temps de chargement'],
                    ['value' => '+45%', 'label' => 'Génération de leads'],
                    ['value' => '100%', 'label' => 'Responsive mobile'],
                ],
                'deliverables' => 'Design System Figma, Développement Laravel/Tailwind, Système de réservation, SEO technique',
                'order' => 5,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Campagne Brand Leadership',
                'slug' => 'campagne-brand-leadership',
                'client' => 'Dirigeant Tech Afrique',
                'service' => 'Personal Branding',
                'image' => 'assets/services/branding1.jpg',
                'challenge' => 'Établir la voix d\'un chef d\'entreprise visionnaire comme leader d\'opinion incontournable sur les enjeux d\'innovation en Afrique.',
                'description' => 'Accompagnement éditorial personnalisé, structuration des prises de parole sur LinkedIn, préparation pour interviews médias et production de visuels d\'autorité.',
                'metrics' => [
                    ['value' => '40K+', 'label' => 'Abonnés qualifiés'],
                    ['value' => '10+', 'label' => 'Tribunes publiées'],
                    ['value' => '4x', 'label' => 'Invitations conférences'],
                ],
                'deliverables' => 'Stratégie de personal branding, Rédaction de tribunes, Shooting portrait exécutif, Stratégie LinkedIn',
                'order' => 6,
                'is_featured' => false,
                'is_active' => true,
            ],
        ];

        foreach ($projects as $project) {
            PortfolioProject::updateOrCreate(
                ['slug' => $project['slug']],
                $project
            );
        }
    }
}
