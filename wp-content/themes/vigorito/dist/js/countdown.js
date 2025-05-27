function startCountdown(name, startDate, endDate, countdownClass) {
  const startTime = new Date(startDate).getTime();
  const endTime = new Date(endDate).getTime();

  const countdownElement = document.querySelector(`.${countdownClass}`);
  const daysElement = countdownElement.querySelector(
    '.numbers[data-unit="days"]'
  );
  const hoursElement = countdownElement.querySelector(
    '.numbers[data-unit="hours"]'
  );
  const minutesElement = countdownElement.querySelector(
    '.numbers[data-unit="minutes"]'
  );
  const secondsElement = countdownElement.querySelector(
    '.numbers[data-unit="seconds"]'
  );

  function updateCountdown() {
    const now = new Date().getTime();
    const timeDifference = endTime - now;

    if (timeDifference <= 0) {
      daysElement.textContent = "0";
      hoursElement.textContent = "0";
      minutesElement.textContent = "0";
      secondsElement.textContent = "0";
      clearInterval(intervalId);
    } else {
      const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
      const hours = Math.floor(
        (timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
      );
      const minutes = Math.floor(
        (timeDifference % (1000 * 60 * 60)) / (1000 * 60)
      );
      const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

      daysElement.textContent = days;
      hoursElement.textContent = hours.toString().padStart(2, "0");
      minutesElement.textContent = minutes.toString().padStart(2, "0");
      secondsElement.textContent = seconds.toString().padStart(2, "0");
    }
  }

  updateCountdown(); // Initial update
  const intervalId = setInterval(updateCountdown, 1000);
}
