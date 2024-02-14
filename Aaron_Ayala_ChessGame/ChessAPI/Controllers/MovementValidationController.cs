using Microsoft.AspNetCore.Mvc;

namespace ChessAPI.Controllers;

[ApiController]
[Route("[controller]")]

public class MovementValidationController : ControllerBase
{
    private IMovementService _movementService;

    public MovementValidationController(IMovementService movementService)
    {
        this._movementService = movementService;
    }

    [HttpGet]
    public IActionResult Get(string board, int fromRow, int fromColumn, int toRow, int toColumn)
    {
        try
        {
            if (string.IsNullOrEmpty(board))
                return BadRequest("board no puede ser IsNullOrEmpty");
            var response = _movementService.getValidation(board,fromRow,fromColumn,toRow,toColumn);
            return Ok(response);    
        }
        catch (System.Exception)
        {
            
            return StatusCode(StatusCodes.Status500InternalServerError);
        }
    }
}