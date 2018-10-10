<?php

namespace App\Application\APIs\Users\Create\Saver;

use App\Application\APIs\Helpers\Builders\Interfaces\UserBuilderInterface;
use App\Application\APIs\Helpers\Hateoas\HateoasBuilder;
use App\Application\APIs\Helpers\Hateoas\LinkFactory;
use App\Application\APIs\Interfaces\OutputItemInterface;
use App\Application\APIs\Users\Create\InputItems\Interfaces\UserInputItemInterface;
use App\Application\APIs\Users\Create\Saver\Interfaces\UserSaverInterface;
use App\Application\APIs\Users\OutputItems\UserOutput;
use App\Domain\Repositories\ClientRepository;
use App\Domain\Repositories\UserRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class Saver implements UserSaverInterface
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var HateoasBuilder
     */
    private $hateoasBuilder;
    /**
     * @var UserBuilderInterface
     */
    private $userBuilder;
    /**
     * @var ClientRepository
     */
    private $clientRepository;

    /**
     * Saver constructor.
     * @param UserRepository $userRepository
     * @param HateoasBuilder $hateoasBuilder
     * @param UserBuilderInterface $userBuilder
     * @param ClientRepository $clientRepository
     */
    public function __construct(
        UserRepository $userRepository,
        HateoasBuilder $hateoasBuilder,
        UserBuilderInterface $userBuilder,
        ClientRepository $clientRepository
    ) {
        $this->userRepository = $userRepository;
        $this->hateoasBuilder = $hateoasBuilder;
        $this->userBuilder = $userBuilder;
        $this->clientRepository = $clientRepository;
    }

    /**
     * @param UserInputItemInterface $inputItem
     *
     * @return OutputItemInterface
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(UserInputItemInterface $inputItem): OutputItemInterface
    {
        $client = $this->clientRepository->loadOneClientById($inputItem->getClient()->getId());

        $user = $this->userBuilder->build($inputItem, $client)
                                  ->getEntity();

        $this->userRepository->saveUser($user);

        return new UserOutput(
            $user,
            [
                $this->hateoasBuilder->build(
                    LinkFactory::GET_SHOW,
                    'User_show',
                    [
                        'client' => $inputItem->getClient()->getId(),
                        'id'     => $user->getId()
                    ]
                ),
                $this->hateoasBuilder->build(
                    LinkFactory::DELETE_SHOW,
                    'User_delete',
                    [
                        'client' => $inputItem->getClient()->getId(),
                        'id'     => $user->getId()
                    ]
                ),
                $this->hateoasBuilder->build(
                    LinkFactory::GET_LIST,
                    'Users_list',
                    ['client' => $inputItem->getClient()->getId()]
                )
            ]
        );
    }
}
