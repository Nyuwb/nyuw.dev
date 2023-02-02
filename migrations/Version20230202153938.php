<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230202153938 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE social (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, target VARCHAR(255) NOT NULL, class VARCHAR(255) NOT NULL, icon VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_7161E1875E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE social');
    }

    public function postUp(Schema $schema): void
    {
        $socials = [
            [
                'name' => 'Github',
                'target' => 'https://github.com/Nyuwb',
                'class' => 'github',
                'icon' => 'fa-github'
            ],
            [
                'name' => 'Discord - Nyuw#0001',
                'target' => 'https://discordapp.com/users/116132887438426115',
                'class' => 'discord',
                'icon' => 'fa-discord'
            ],
            [
                'name' => 'Twitter',
                'target' => 'https://twitter.com/Nyuwb',
                'class' => 'twitter',
                'icon' => 'fa-twitter'
            ],
            [
                'name' => 'Mastodon',
                'target' => 'https://fosstodon.org/@nyuw',
                'class' => 'mastodon',
                'icon' => 'fa-mastodon'
            ],
            [
                'name' => 'Twitch',
                'target' => 'https://www.twitch.tv/nyuw',
                'class' => 'twitch',
                'icon' => 'fa-twitch'
            ]
        ];
        foreach ($socials as $social) {
            $this->connection->insert('social', $social);
        }
    }
}
