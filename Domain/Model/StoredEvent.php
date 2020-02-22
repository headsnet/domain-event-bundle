<?php
/**
 * This file is part of the Symfony HeadsnetDomainEventsBundle.
 *
 * (c) Headstrong Internet Services Ltd 2020
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Headsnet\DomainEventsBundle\Domain\Model;

class StoredEvent
{
	/**
	 * @var string
	 */
	private $eventId;

	/**
	 * @var \DateTimeImmutable
	 */
	private $occurredOn;

	/**
	 * @var string
	 */
	private $actorId;

	/**
	 * @var \DateTimeImmutable
	 */
	private $publishedOn;

	/**
	 * @var string
	 */
	private $aggregateRoot;

	/**
	 * @var string
	 */
	private $typeName;

	/**
	 * @var string
	 */
	private $eventBody;

	public function __construct(
	    EventId            $eventId,
		string             $typeName,
		\DateTimeImmutable $occurredOn,
		string             $rootId,
		string             $eventBody,
		?string            $actorId = null
	)
	{
		$this->eventId = $eventId->asString();
		$this->typeName = $typeName;
		$this->occurredOn = $occurredOn;
		$this->aggregateRoot = $rootId;
		$this->eventBody = $eventBody;
		$this->actorId = $actorId;
	}

	public function getEventId(): EventId
	{
		return EventId::fromString($this->eventId);
	}

	public function getOccurredOn(): \DateTimeImmutable
	{
		return $this->occurredOn;
	}

	public function getPublishedOn(): \DateTimeImmutable
	{
		return $this->publishedOn;
	}

	public function setPublishedOn(\DateTimeImmutable $publishedOn): StoredEvent
	{
		$this->publishedOn = $publishedOn;

		return $this;
	}

	public function getTypeName(): string
	{
		return $this->typeName;
	}

	public function getAggregateRoot(): string
	{
		return $this->aggregateRoot;
	}

	public function getEventBody(): string
	{
		return $this->eventBody;
	}

	public function getActorId(): string
	{
		return $this->actorId;
	}
}
