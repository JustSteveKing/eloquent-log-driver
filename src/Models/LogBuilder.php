<?php

declare(strict_types=1);

namespace JustSteveKing\EloquentLogDriver\Models;

use Illuminate\Database\Eloquent\Builder;

class LogBuilder extends Builder
{
    public function whereLevel(string $level): self
    {
        return $this->where('level', $level);
    }

    public function whereInfo(): self
    {
        return $this->whereLevel('INFO');
    }

    public function whereDebug(): self
    {
        return $this->whereLevel('DEBUG');
    }

    public function whereNotice(): self
    {
        return $this->whereLevel('NOTICE');
    }

    public function whereWarning(): self
    {
        return $this->whereLevel('WARNING');
    }

    public function whereError(): self
    {
        return $this->whereLevel('ERROR');
    }

    public function whereCritical(): self
    {
        return $this->whereLevel('CRITICAL');
    }

    public function whereAlert(): self
    {
        return $this->whereLevel('ALERT');
    }

    public function whereEmergency(): self
    {
        return $this->whereLevel('EMERGENCY');
    }
}
