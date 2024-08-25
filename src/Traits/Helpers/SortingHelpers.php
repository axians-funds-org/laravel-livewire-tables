<?php

namespace Rappasoft\LaravelLivewireTables\Traits\Helpers;

trait SortingHelpers
{
    public function getSortingStatus(): bool
    {
        return $this->sortingStatus;
    }

    public function getSingleSortingStatus(): bool
    {
        return $this->singleColumnSortingStatus;
    }

    /**
     * @return array<mixed>
     */
    public function getSorts(): array
    {
        return $this->{$this->getTableName()}['sorts'] ?? [];
    }

    /**
     * @param  array<mixed>  $sorts
     * @return array<mixed>
     */
    public function setSorts(array $sorts): array
    {
        return $this->{$this->getTableName()}['sorts'] = $sorts;
    }

    public function getSort(string $field): ?string
    {
        return $this->{$this->getTableName()}['sorts'][$field] ?? null;
    }

    public function setSort(string $field, string $direction): string
    {
        return $this->{$this->getTableName()}['sorts'][$field] = $direction;
    }

    public function hasSorts(): bool
    {
        return count($this->getSorts()) > 0;
    }

    public function hasSort(string $field): bool
    {
        return $this->getSort($field) !== null;
    }

    /**
     * Clear the sorts array
     */
    public function clearSorts(): void
    {
        $this->{$this->getTableName()}['sorts'] = [];
    }

    public function clearSort(string $field): void
    {
        unset($this->{$this->getTableName()}['sorts'][$field]);
    }

    public function setSortAsc(string $field): string
    {
        return $this->setSort($field, 'asc');
    }

    public function setSortDesc(string $field): string
    {
        return $this->setSort($field, 'desc');
    }

    public function isSortAsc(string $field): bool
    {
        return $this->getSort($field) === 'asc';
    }

    public function isSortDesc(string $field): bool
    {
        return $this->getSort($field) === 'desc';
    }

    public function sortingIsEnabled(): bool
    {
        return $this->getSortingStatus() === true;
    }

    public function sortingIsDisabled(): bool
    {
        return $this->getSortingStatus() === false;
    }

    public function singleSortingIsEnabled(): bool
    {
        return $this->getSingleSortingStatus() === true;
    }

    public function singleSortingIsDisabled(): bool
    {
        return $this->getSingleSortingStatus() === false;
    }

    public function hasDefaultSort(): bool
    {
        return $this->getDefaultSortColumn() !== null;
    }

    public function getDefaultSortColumn(): ?string
    {
        return $this->defaultSortColumn;
    }

    public function getDefaultSortDirection(): string
    {
        return $this->defaultSortDirection;
    }

    public function getSortingPillsStatus(): bool
    {
        return $this->sortingPillsStatus;
    }

    public function sortingPillsAreEnabled(): bool
    {
        return $this->getSortingPillsStatus() === true;
    }

    public function sortingPillsAreDisabled(): bool
    {
        return $this->getSortingPillsStatus() === false;
    }

    public function getDefaultSortingLabelAsc(): string
    {
        return $this->defaultSortingLabelAsc;
    }

    public function getDefaultSortingLabelDesc(): string
    {
        return $this->defaultSortingLabelDesc;
    }

    public function getSortAscendingIcon(): string
    {
        return
            '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3l-7 7h4v7h6v-7h4l-7-7zm-7 9v2h14v-2H3z" clip-rule="evenodd" />
            </svg>';
    }

    public function getSortDescendingIcon(): string
    {
        return
            '<svg xmlns="http://www.w3.org/2000/svg" class="ml-1" style="width:1em;height:1em;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>';
    }

    public function getSortIcon(): string
    {
        return
            '<svg xmlns="http://www.w3.org/2000/svg" class="ml-1" style="width:1em;height:1em;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
            </svg>';
    }
}
