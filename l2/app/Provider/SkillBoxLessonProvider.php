<?php
declare(strict_types=1);

namespace App\Provider;

use App\Contract\LessonProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SkillBoxLession
 * @package App\Adapter
 */
class SkillBoxLessonProvider implements LessonProviderInterface
{
    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $password;

    /**
     * @var float
     */
    private $timeout;

    /**
     * SkillBoxLesson constructor.
     * @param string $host
     * @param string $user
     * @param string $password
     * @param float $timeout
     */
    public function __construct(string $host, string $user, string $password, float $timeout = 1)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->timeout = $timeout;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function getResponse(Request $request): Response
    {
        $client = new GuzzleHttp\Client();
        $response = $client->request('GET', $this->host, [
            'auth' => [$this->user, $this->password],
            'connect_timeout' => $this->timeout,
            'query' => [
                $request->all()
            ]
        ]);
        // check response code status
        return new Response(
            $response->getBody(),
            $response->getStatusCode()
        );
    }

}