<?php

declare(strict_types=1);

namespace App\Webhook\Connector;

use App\Entity\StationWebhook;
use App\Entity\Station;
use App\Entity\Api\NowPlaying\NowPlaying;

interface ConnectorInterface
{
    /**
     * Return a boolean indicating whether this connector should dispatch, given the current events
     * that are set to be triggered, and the configured triggers for this connector.
     *
     * @param \App\Entity\StationWebhook $webhook
     * @param array<string> $triggers
     *
     * @return bool Whether the given webhook should dispatch with these triggers.
     */
    public function shouldDispatch(
        StationWebhook $webhook,
        array $triggers = []
    ): bool;

    /**
     * Trigger the webhook for the specified station, now playing entry, and specified configuration.
     *
     * @param \App\Entity\Station $station
     * @param \App\Entity\StationWebhook $webhook
     * @param \App\Entity\Api\NowPlaying\NowPlaying $np
     * @param array<string> $triggers
     */
    public function dispatch(
        Station $station,
        StationWebhook $webhook,
        NowPlaying $np,
        array $triggers
    ): void;
}
