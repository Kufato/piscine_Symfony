<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShadesController extends AbstractController
{
    #[Route('/e03', name: 'shades_page')]
    public function shades_page(): Response
    {
        # Get the numbers of shades in the config file and set the variables
        $shades_number = $this->getParameter('e03.number_of_colors');

        # Define the colors with a name, start color(white) and a end color
        $baseColors = [
            'black' => [[255,255,255], [0,0,0]],
            'red'   => [[255,255,255], [255,0,0]],
            'green' => [[255,255,255], [0,255,0]],
            'blue'  => [[255,255,255], [0,0,255]],
            // 'yellow'=> [[255,255,255], [245, 221, 5]],
            // 'pink'  => [[255,255,255], [241, 5, 245]],
            // 'orange'  => [[255,255,255], [245, 101, 5]]
        ];

        $shades = [];

        foreach ($baseColors as $name => [$start, $end]) {
            $shades[$name] = $this->generateShades($start, $end, $shades_number);
        }

        # Return the datas to the template
        return $this->render('shades_page.html.twig', [
            'shades' => $shades,
            'numberOfColors' => $shades_number,
        ]);
    }

    # This function loop on the number set in the config file to get a ratio between 0 and 1
    # Then we multiply this ratio by the difference between the starting value and the ending value.
    # Finally, we add this to the starting value.
    private function generateShades(array $start, array $end, int $count): array
    {
        $result = [];

        for ($i = 0; $i < $count; $i++) {
            $ratio = $i / ($count - 1);

            $r = (int) round($start[0] + ($end[0] - $start[0]) * $ratio);
            $g = (int) round($start[1] + ($end[1] - $start[1]) * $ratio);
            $b = (int) round($start[2] + ($end[2] - $start[2]) * $ratio);

            $result[] = "rgb($r,$g,$b)";
        }

        return $result;
    }
}