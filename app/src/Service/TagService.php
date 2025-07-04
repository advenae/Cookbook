<?php

/**
 * Tag service.
 */

namespace App\Service;

use App\Entity\Tag;
use App\Repository\TagRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * Class TagService.
 */
class TagService implements TagServiceInterface
{
    /**
     * Constructor.
     *
     * @param TagRepository      $tagRepository Tag repository
     * @param PaginatorInterface $paginator     Paginator
     */
    public function __construct(private readonly TagRepository $tagRepository, private readonly PaginatorInterface $paginator)
    {
    }

    /**
     * Get paginated list.
     *
     * @param int $page Page number
     *
     * @return PaginationInterface<string, mixed> Paginated list
     */
    public function getPaginatedList(int $page): PaginationInterface
    {
        return $this->paginator->paginate(
            $this->tagRepository->queryAll(),
            $page,
            TagRepository::PAGINATOR_ITEMS_PER_PAGE
        );
    }

    /**
     * Save entity.
     *
     * @param Tag $tags Tag entity
     */
    public function save(Tag $tags): void
    {
        $this->tagRepository->save($tags);
    }

    /**
     * Delete entity.
     *
     * @param Tag $tags Tag entity
     */
    public function delete(Tag $tags): void
    {
        $this->tagRepository->delete($tags);
    }

    /**
     * Find by title.
     *
     * @param string $title Tag title
     *
     * @return Tag|null Tag entity
     */
    public function findOneByTitle(string $title): ?Tag
    {
        return $this->tagRepository->findOneBy(['title' => $title]);
    }

    /**
     * Find by id.
     *
     * @param int $id Tag id
     *
     * @return Tag|null Tag entity
     */
    public function findOneById(int $id): ?Tag
    {
        return $this->tagRepository->findOneBy(['id' => $id]);
    }
}
