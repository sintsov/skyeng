<?php
declare(strict_types=1);

namespace App\Controller;

use App\Provider\SkillBoxLessonProvider;
use App\Service\SkillBoxLessonService;
use App\Validator\Request\LessonValidatorRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class LessonController
 * @package App\Controller
 */
class LessonController extends BaseController
{

    /**
     * @param LessonValidatorRequest $request
     * @return mixed
     */
    public function action(LessonValidatorRequest $request): Response
    {
        return (new SkillBoxLessonService(
            $this->container->get('lessonProvider'),
            $this->container->get('cache'),
            $this->container->get('logger'),
        ))->getResponse($request);
    }
}