<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;
use AppBundle\Entity\Articles;
use AppBundle\Entity\Authors;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Style\SymfonyStyle;
use AppBundle\Controller\Buzz;

class GetDemoDataCommand extends ContainerAwareCommand
{
    protected $container;
    protected function configure()
    {
        $this
            ->setName('api:loadData')
            ->setDescription('Get Data from API to database.')
            ->setHelp('This command allows you to load demo data for app.');
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(array(
            '<info>Загрузка в данных в MySql</>',
            '<info>==========================</>',
            '<info>..............</>',
        ));

        $this->container = $this->getApplication()->getKernel()->getContainer();

        $em = $this->container->get('doctrine')->getManager();
        $buzz = $this->container->get('buzz');

        $response = $buzz->get('https://jetstyle-junior-test.herokuapp.com');
        $rsp = json_decode($response->getContent());

        $tags = '';

        foreach ($rsp as $article) {
            $art = new Articles();
            $author = new Authors();

            foreach ($article as $name => $field) {
                if ($name == 'title')  $art->setTitle($field);
                if ($name == 'teaser') $art->setContent($field);
                if ($name == 'published') $art->setPublished($field);
                if ($name == 'author') {
                    foreach ($field as $name => $aField) {
                        if($name == 'id') $author->setId($aField);
                        if ($name == 'name') $author->setName($aField);
                        if ($name == 'email') $author->setEmail($aField);
                    }
                    $em->persist($author);
                    $em->flush();

                    $art->setAuthor($author);
                }

                if ($name == 'tags') {
                    foreach ($field as $tag) {
                        foreach ($tag as $name => $tField)
                            $s = $name == 'name' ?  $tField : '';
                            $tags = $tags.$s.' ';
                    }
                    $art->setTags($tags);
                    $tags = '';
                }
            }
            $em->persist($art);
            $em->flush();
        }

        $io = new SymfonyStyle($input, $output);
        $io->getErrorStyle()->warning('Данные загружены в базу данных.');
    }
}