<?php

namespace Aventura\Diary\Bookable\Availability\Timetable\Rule;

use \Aventura\Diary\DateTime\DateTimeInterface;
use \Aventura\Diary\DateTime\Period\PeriodInterface;

/**
 * DateTimeRangeRule
 *
 * @author Miguel Muscat <miguelmuscat93@gmail.com>
 */
class DateTimeRangeRule extends RangeRuleAbstract
{
    
    /**
     * Constructs a new instance.
     * 
     * @param DateTimeInterface $lower The range's lower boundary.
     * @param DateTimeInterface $upper The range's upper boundary.
     */
    public function __construct(DateTimeInterface $lower, DateTimeInterface $upper)
    {
        $this->setLower($lower)
                ->setUpper($upper)
                ->setLowerInclusive(true)
                ->setUpperInclusive(false)
                ->setNegation(false);
    }

    /**
     * {@inheritdoc}
     * 
     * @param PeriodInterface $period The period to check.
     * @return boolean <b>True</b> if the period obeys the rule, <b>false</b> otherwise.
     */
    protected function _obeys(PeriodInterface $period)
    {
        return $period->getStart()->isAfter($this->getLower(), $this->isLowerInclusive()) &&
                $period->getEnd()->isBefore($this->getUpper(), $this->isUpperInclusive());
    }

}
