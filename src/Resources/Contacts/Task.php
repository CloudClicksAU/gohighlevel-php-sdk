<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Contacts;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\TaskContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Task implements TaskContract
{
    use Transportable;

    /**
     * {@inheritDoc}
     */
    public function list(string $contactId): string|array
    {
        $payload = Payload::get("contacts/{$contactId}/tasks");

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function create(string $contactId, array $params): string|array
    {
        $payload = Payload::create("contacts/{$contactId}/tasks", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $contactId, string $taskId): string|array
    {
        $payload = Payload::get("contacts/{$contactId}/tasks/{$taskId}");

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function update(string $contactId, string $taskId, array $params): string|array
    {
        $payload = Payload::put("contacts/{$contactId}/tasks/{$taskId}", $params);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $contactId, string $taskId): string|array
    {
        $payload = Payload::delete("contacts/{$contactId}/tasks/", $taskId);

        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * {@inheritDoc}
     */
    public function completed(string $contactId, string $taskId, bool $completed): string|array
    {
        $payload = Payload::put("contacts/{$contactId}/tasks/{$taskId}/completed", [
            'completed' => $completed,
        ]);

        return $this->transporter->requestObject($payload)->data();
    }
}
